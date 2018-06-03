<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_informations', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->boolean('marital')
                ->comment(
                        '0: Soltero(a),
                         1: Casado(a),
                         2: Divorciado(a),
                         3: Viudo(a)'
                    );
            $table->string('address');            
            $table->string('personal_email')->unique();
            $table->string('department');
            $table->string('town'); 
            $table->date('birthdate');           
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
        Schema::dropIfExists('personal_informations');
    }
}
