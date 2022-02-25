<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questioneds', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('questionnaire_id');
            $table->integer("type_id")->default(1);
            $table->string("to_whom");
            $table->json("answers");
            $table->timestamps();
            $table->unique(['user_id', 'questionnaire_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questioneds');
    }
}
