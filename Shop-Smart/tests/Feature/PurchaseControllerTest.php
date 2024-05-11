<?php

use App\Models\Address;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\getJson;
use function Pest\Laravel\json;
use function PHPUnit\Framework\assertNotEmpty;

beforeEach(function () {
    $this->user = User::factory()->create();

    $this->address = Address::factory()->create([
        'user_id' => $this->user->id
    ]);

    actingAs($this->user);


    Purchase::factory(5)->create([
        'user_id' => $this->user->id,
        'address_id' => $this->address->id,
        'total_price'=> 10
    ]);

    Product::factory(5)->create();

    Purchase::all()->map(function (Purchase $purchase) {
        $purchase->products()->sync(Product::all()->pluck('id'));
    });

});

it('lists purchases', function () {

    // Act

    $response = getJson('/api/purchases');

    // Assert

    $response->assertJsonStructure([
        'data' => [
            '*' => [
                'purchase_id',
                'total_price',
                'address' => [
                    'id',
                    'user_id',
                    'country',
                    'state',
                    'city',
                    'street_name',
                    'building_number',
                    'floor_number',
                    'apartment_number',
                    'additional_details'
                ],
                'products' => [
                    '*' => [
                        'id',
                        'name',
                        'description',
                        'price'
                    ]
                ]
            ]
        ]
    ]);

    assertNotEmpty($response->json('data.0.products'));
});

it('filters purchases using date filter', function () {
    Purchase::factory(2)->create([
        'user_id' => $this->user->id,
        'address_id' => $this->address->id,
        'created_at' => '2024-05-05'
    ]);

    Purchase::factory()->create([
        'user_id' => $this->user->id,
        'address_id' => $this->address->id,
        'created_at' => '2024-05-08'
    ]);

    Purchase::factory()->create([
        'user_id' => $this->user->id,
        'address_id' => $this->address->id,
        'created_at' => '2024-05-10'
    ]);

    //Act
    $response = json('GET', '/api/purchases', [
        'start_date'=> '2024-05-08',
        'end_date' => '2024-05-10',
    ]);

    //assert

    $response->assertJsonCount(2, 'data');
});

it('filters purchases using amount filter', function () {
    Purchase::factory(1)->create([
        'user_id' => $this->user->id,
        'address_id' => $this->address->id,
        'total_price' => 500
    ]);

    Purchase::factory()->create([
        'user_id' => $this->user->id,
        'address_id' => $this->address->id,
        'total_price' => 400
    ]);

    Purchase::factory()->create([
        'user_id' => $this->user->id,
        'address_id' => $this->address->id,
        'total_price' => 300
    ]);


    $response = json('Get','/api/purchases',[
       'min_amount'=> 400,
       'max_amount'=> 800
    ]);


    $response->assertJsonCount(2, 'data');
});


it('filters purchases using sorting filter', function () {
    Purchase::factory(1)->create([
        'user_id' => $this->user->id,
        'address_id' => $this->address->id,
        'total_price' => 500
    ]);

    Purchase::factory()->create([
        'user_id' => $this->user->id,
        'address_id' => $this->address->id,
        'total_price' => 400
    ]);

    Purchase::factory()->create([
        'user_id' => $this->user->id,
        'address_id' => $this->address->id,
        'total_price' => 300
    ]);

    $response =json('GET', '/api/purchases',[
        'sort_by'=> 'total_price',
        'sort_order'=>'desc'
    ]);

    expect($response->json('data.0.total_price'))->toBe(500);
});


it('lists only auth user purchases', function () {
   $anotherUser = User::factory()->create();

    $anotherUser->address = Address::factory()->create([
        'user_id' => $anotherUser->id
    ]);

    Purchase::factory(5)->create([
        'user_id' => $anotherUser->id,
        'address_id' => $anotherUser->address->id,
        'total_price'=> 10
    ]);



    $response = getJson('/api/purchases');

    $response->assertJsonCount(5, 'data');


});
