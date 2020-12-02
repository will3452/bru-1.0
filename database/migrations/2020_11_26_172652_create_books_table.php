<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('class');
            $table->string('category');
            $table->string('title');
            $table->string('type');
            $table->string('author');
            $table->string('genre');
            $table->string('language');
            $table->string('lead_character');
            $table->string('lead_college');
            $table->longText('blurb');
            $table->string('cost')->nullable();
            $table->string('review_question_1')->nullable();
            $table->string('review_question_2')->nullable();
            $table->longText('credit');
            $table->text('cover');
            $table->string('publish_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
