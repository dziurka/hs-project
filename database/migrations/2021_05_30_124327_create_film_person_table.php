<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmPersonTable extends Migration
{
    public function up(): void
    {
        Schema::create('film_person', function (Blueprint $table) {
            $table->uuid('film_id');
            $table->uuid('person_id');

            $table->foreign('film_id')->references('id')->on('films')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('person_id')->references('id')->on('persons')
                ->cascadeOnDelete()->cascadeOnUpdate();;
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('film_person');
    }
}
