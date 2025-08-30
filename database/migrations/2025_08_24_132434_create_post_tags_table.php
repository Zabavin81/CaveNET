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
        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id')->nullable(); //->nullable() лишний;
            $table->unsignedBigInteger('tag_id')->nullable(); //->nullable() лишний;
            $table->timestamps();

            $table->index('post_id','post_tags_post_id_index');
            $table->index('tag_id','post_tags_tag_id_index');

            $table->unique(['post_id','tag_id']);

            $table->foreign('post_id','post_tags_post_id_fk')->on('posts')->references('id')->cascadeOnDelete();
            $table->foreign('tag_id','post_tags_tag_id_fk')->on('tags')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tags');
    }
};
