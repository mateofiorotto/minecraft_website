<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            //con titulo, contenido, imagen, active y category cumplimos los 5 campos
            $table->id();
            $table->string('title', 100);
            $table->string('subtitle', 200);
            $table->text('content');
            $table->string('image', 100);
            $table->boolean('active'); //si esta activa o no, para poder deshablitar noticias sin borrarlas
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes(); //borrado logico
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
