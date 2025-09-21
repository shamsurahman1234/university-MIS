<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('university_id');
            $table->timestamps();

            $table->foreign('university_id')
                  ->references('id')
                  ->on('universities')
                  ->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('faculties');
    }
};
