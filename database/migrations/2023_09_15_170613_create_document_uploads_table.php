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
        Schema::create('document_uploads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sent_from'); // Add user_id column
            $table->unsignedBigInteger('sent_to'); // Add user_id column
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('file_path');
            $table->timestamps();

            // Define foreign key relationship
            $table->foreign('sent_from')->references('id')->on('users');
            $table->foreign('sent_to')->references('id')->on('users');
            // ->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_uploads');
    }
};
