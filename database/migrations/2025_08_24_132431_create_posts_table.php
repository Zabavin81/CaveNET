<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * tag+
     * author+
     * body+
     * title+
     * comments+
     * category+
     * likes+
     * published_at+
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('body');
            $table->unsignedInteger('likes')->default(0);
            $table->boolean('is_published')->default(false);
            $table->dateTime('published_at')->nullable();

            $table->unsignedBigInteger('profile_id')->nullable(); //->nullable() лишний;
            $table->unsignedBigInteger('category_id')->nullable();

            $table->index('profile_id', 'post_profile_id_index');
            $table->index('category_id', 'post_category_id_index');

            $table->foreign('profile_id', 'post_profile_fk')->on('profiles')->references('id')->cascadeOnDelete();
            $table->foreign('category_id', 'post_category_fk')->on('categories')->references('id')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
