<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('user_id');
            $table->string('location_name', 255);
            $table->integer('limit');
            $table->integer('width');
            $table->integer('height');
            $table->integer('parent_id');
            $table->integer('sort_order');
            $table->enum('types', ['Banner', 'Privilege', 'ClickChanel', 'ShopOfTheWeek']);
            $table->tinyInteger('flag_last');
            $table->tinyInteger('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('location');
    }
}
