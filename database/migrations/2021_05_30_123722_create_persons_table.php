<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonsTable extends Migration
{
    public function up(): void
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->unsignedSmallInteger('height')->nullable();
            $table->unsignedSmallInteger('mass')->nullable();
            $table->string('hair_color')->nullable();
            $table->string('skin_color')->nullable();
            $table->string('eye_color')->nullable();
            $table->string('birth_year')->nullable();
            $table->string('gender')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('persons');
    }
}
