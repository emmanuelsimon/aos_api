<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToEtapesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('etapes', function (Blueprint $table) {
            $table->date('date_debut')->nullable();
            $table->integer('nbr_nuit')->nullable();
            $table->dropColumn('step');
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
        Schema::table('etapes', function (Blueprint $table) {
            $table->dropColumn('date_debut');
            $table->dropColumn('nbr_nuit');
            $table->integer('step')->nullable();
            $table->dropSoftDeletes();
        });
    }
}
