<?php

use App\Models\Decision;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDecisionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decision_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Decision::class);
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
        Schema::dropIfExists('decisionr_translations');
    }
}
