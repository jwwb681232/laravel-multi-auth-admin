<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('')->comment('菜单名称');
            $table->string('url')->default('')->comment('菜单链接');
            $table->string('slug')->default('')->comment('权限名称');
            $table->string('icon')->default('')->comment('菜单图标');
            $table->integer('parent_id')->unsigned()->default(0)->comment('父级菜单id');
            $table->string('heightlight_url')->default('')->comment('菜单高亮');
            $table->integer('sort')->unsigned()->default(0)->comment('排序');
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
        Schema::drop('menus');
    }
}
