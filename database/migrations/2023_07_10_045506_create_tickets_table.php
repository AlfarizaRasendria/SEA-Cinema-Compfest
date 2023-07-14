<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('status', ['available', 'booked']);
            $table
                ->foreignId('id_order')
                ->nullable()->references('id')
                ->on('orders')
                ->constrained('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ;
            $table
                ->foreignId('id_movie')
                ->references('id')
                ->on('movies')
                ->constrained('movies')
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->nullable();
            $table
                ->foreignId('id_seat')
                ->references('id')
                ->on('seats')
                ->constrained('seats')
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
