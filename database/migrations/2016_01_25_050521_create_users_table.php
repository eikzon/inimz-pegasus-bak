<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('group_id')->unsigned()->index();
            $table->string('username', 255);
            $table->string('password', 60);
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('position', 255);
            $table->string('department', 255);
            $table->tinyInteger('status');
            $table->timestamps();
            $table->softDeletes();
            // $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user');
    }
}
