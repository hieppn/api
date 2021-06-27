<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->default('USER');
            $table->string('image')->default('https://firebasestorage.googleapis.com/v0/b/api-images-ec7ab.appspot.com/o/images%2Fpngtree-man-default-avatar-png-image_2813122.jpg?alt=media&token=d77e17e0-5240-4bf3-b91a-25bd0076b9c9');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
