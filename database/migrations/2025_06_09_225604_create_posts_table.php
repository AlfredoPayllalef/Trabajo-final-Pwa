<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            
            $table->string('title');
            $table->string('poster')->nullable(); 
            
            $table->boolean('habilitated')->default(false);
            $table->text('content');
            
            // Relación con categorías (tabla debe ser 'categories')
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');

            // Relación con usuarios (tabla debe ser 'users')
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
