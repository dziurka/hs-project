<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    public function up(): void
    {
        Schema::create('films', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->unsignedTinyInteger('episode_id');
            $table->mediumText('opening_crawl');
            $table->string('director');
            $table->string('producer');
            $table->string('url');
            $table->timestamp('release_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('films');
    }
}
