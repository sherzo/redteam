<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColorColumnToPublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('publications', function (Blueprint $table) {
            $table->string('color', 7)
                ->after('emergency')
                ->nullable()
                ->comment('Determina si es un a notificación de admin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('publications', function (Blueprint $table) {
            $table->dropColumn('color');
        });
    }
}
