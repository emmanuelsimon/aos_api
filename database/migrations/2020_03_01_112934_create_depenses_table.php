<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle');
            $table->unsignedBigInteger('etape_id');
            $table->unsignedBigInteger('categorie_depenses_id');
            $table->string('observation');
            $table->text('commentaires');
            $table->boolean('isPaid');
            $table->foreign('etape_id')
                ->references('id')
                ->on('etapes');
            $table->foreign('categorie_depenses_id')
                ->references('id')
                ->on('categorie_depenses');
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
        Schema::dropIfExists('depenses');
    }
}
