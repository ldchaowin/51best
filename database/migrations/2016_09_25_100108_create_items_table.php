<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('items',function(Blueprint $table){
            $table->increments('id');
            $table->integer('chart_id');
            $table->integer('ranking');
            $table->char('name');
            $table->text('introduction')->nullable();
            $table->text('image_address')->nullable();
            $table->text('add_link')->nullable();
            $table->integer('agreed_num');
            $table->integer('comment_num');


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
        //
    }
}
