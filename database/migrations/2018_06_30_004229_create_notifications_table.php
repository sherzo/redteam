<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')
                ->nullable()
                ->comment('Usuario generador de la notif.');
            
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->boolean('type')->comment('
                    0: Publicacion, 
                    1: Imagen, 
                    2: Archivo, 
                    3: Cumpleaños, 
                    4: Me gusta, 
                    5: Comentario, 
                    6: Pago, 
                    7: Publicaciones urgente, 
                    8: Actualización perfil, 
                    9: Evento calendario');

            $table->text('data');
            $table->string('url')->nullable();
            $table->timestamp('read_at')->nullable();
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
        Schema::dropIfExists('notifications');
    }
}
