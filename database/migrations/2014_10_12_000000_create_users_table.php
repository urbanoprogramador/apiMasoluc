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
        Schema::create('permissions',function(Blueprint $table){
            $table->smallIncrements('id');
            $table->string('name',50);
            $table->string('lavel',10);
            $table->unsignedSmallInteger('parent_id');
            $table->string('title',50);
        });
        Schema::create('roles',function(Blueprint $table){
            $table->smallIncrements('id');
            $table->string('role');
            $table->string('description');
            $table->timestamps();
            $table->softDeletes();
        });



        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('pic')->nullable();
            $table->string('occupation');
            $table->string('companyName');
            $table->string('phone');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('role_user',function(Blueprint $table){
            $table->unsignedBigInteger('user_id');
            $table->unsignedSmallInteger('role_id');

            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('user_id')->references('id')->on('users');
        });


        Schema::create('permission_role',function(Blueprint $table){

            $table->unsignedSmallInteger('role_id');
            $table->unsignedSmallInteger('permission_id');

            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('permission_id')->references('id')->on('permissions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_role');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('roles_users');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('users');
    }
}
