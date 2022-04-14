<?php

use App\Models\Tender;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenderTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tender_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Tender::class);
            $table->string('locale');
            $table->string('title');
            $table->mediumText('description')->nullable();
            $table->text('body');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tender_translations');
    }
}
