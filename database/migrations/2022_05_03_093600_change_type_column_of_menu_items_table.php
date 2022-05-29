<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTypeColumnOfMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('menu_items', function($table)
//        {
//            $table->bigInteger('parent_id')->nullable()->change();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('menu_items', function($table)
//        {
//            $table->integer('parent_id')->unsigned()->nullable(false)->change();
//        });
    }
}
