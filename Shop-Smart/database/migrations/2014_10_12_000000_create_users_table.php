<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('users', function(Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('password', 100);
            $table->string('profile_pic', 255)->nullable();
            $table->string('phone', 11)->nullable();
            $table->string('email', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('users');
    }
};
