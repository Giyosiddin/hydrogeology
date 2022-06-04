<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('decision_translations', function($table)
        {
            $table->longText('body')->nullable()->change();
        });
        Schema::table('page_translations', function($table)
        {
            $table->longText('body')->nullable()->change();
        });
        Schema::table('news_translations', function($table)
        {
            $table->longText('body')->nullable()->change();
        });
        Schema::table('vacancy_translations', function($table)
        {
            $table->longText('body')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('decision_translations', function($table)
        {
            $table->text('body')->nullable()->change();
        });
    }
}
