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
            $table->id("id");
            $table->timestamps();
            $table->unsignedBigInteger('id_autor');
            $table->foreign("id_autor")->references("id")->on("users");
            $table->string("titulo", 64);
            $table->string("texto", 1024);
            $table->string("imagem");
            $table->dateTime("data");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
        $table->unsignedBigInteger('id_autor')->references("id")->on("users")->onDelete('cascade');
    }
};
