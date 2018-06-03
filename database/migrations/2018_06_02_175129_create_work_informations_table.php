<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')
                ->references('id')
                ->on('areas');

            $table->unsignedInteger('branch_id');
            $table->foreign('branch_id')
                ->references('id')
                ->on('branches');

            $table->unsignedInteger('mark_id');
            $table->foreign('mark_id')
                ->references('id')
                ->on('marks');

            $table->string('phone');
            $table->date('admission');
            $table->string('extension');
            $table->string('position'); //cargo

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
                
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
        Schema::dropIfExists('work_informations');
    }
}
