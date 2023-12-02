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
        Schema::create('blocks', function (Blueprint $table) {
            $table->increments("Id");
            $table->integer("TopicId")->unsigned();
            $table->foreign("TopicId")->references("Id")->on("topics")->cascadeOnDelete()->change();
            $table->string("Title",255);
            $table->longText("Content")->nullable();
            $table->string("imagePath",255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blocks');
    }
};
