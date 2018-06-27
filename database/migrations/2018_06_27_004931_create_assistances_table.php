<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssistancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistances', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id');
            
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->timestamp('entry')->useCurrent();
            $table->timestamp('exit')->nullable();
            
            $table->boolean('entry_status')
            	->default(1)
            	->comment('1 Bien, 0 Tarde');
            
            $table->boolean('exit_status')
            	->default(1)
            	->commnet('1 Bien, 0 Salida temprano');

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
        Schema::dropIfExists('assistances');
    }
}
