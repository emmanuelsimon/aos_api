<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditColumnsToDepensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('depenses', function (Blueprint $table) {
            $table->dropForeign('depenses_etape_id_foreign');
            $table->foreign('etape_id')
                ->references('id')
                ->on('etapes')
                ->onDelete('cascade');
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
        Schema::table('depenses', function (Blueprint $table) {
            $table->dropForeign('depenses_etape_id_foreign');
            $table->foreign('etape_id')
                ->references('id')
                ->on('etapes');
            $table->dropSoftDeletes();
        });
    }
}
