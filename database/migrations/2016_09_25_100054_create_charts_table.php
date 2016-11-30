<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* 新建榜单表单
        * 包含 名称、引用地址、类别、介绍、图片地址、创建者、收藏次数、浏览次数
        * 外键为 创建者 依赖于 users表的主键
        */
        Schema::create('charts',function(Blueprint $table){
            $table->increments('id');
            $table->char('name');
            $table->text('quote_address')->nullable();
            $table->char('class')->nullable();
            $table->text('introduction')->nullable();
            $table->text('image_address')->nullable();
            $table->integer('user_id');
            $table->integer('appreciated_num');
            $table->integer('clicked_num');
            $table->integer('item_num');
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
