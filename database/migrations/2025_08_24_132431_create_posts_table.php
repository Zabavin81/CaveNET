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
            $table->unsignedInteger('views')->default(0);

            $table->foreignId('profile_id')->index()->constrained('profiles');
            $table->foreignId('category_id')->index()->constrained('categories');
            $table->softDeletes();


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
