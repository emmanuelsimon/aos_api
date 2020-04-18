<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnVoyageIdTableEtapes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('etapes', function (Blueprint $table) {
            $table->unsignedBigInteger('voyage_id')->nullable();
            $table->foreign('voyage_id')
                ->references('id')
                ->on('voyages')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('etapes', function(Blueprint $table) {
           $table->dropForeign('voyage_id_foreign');
           $table->dropColumn('voyage_id');
        });
    }
}
