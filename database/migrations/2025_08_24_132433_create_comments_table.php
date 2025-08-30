<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * body+
     * author+
     * post+
     * parent
     * likes
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('body');

            $table->unsignedBigInteger('parent_id')->nullable()->nullable(); //->nullable() лишний;
            $table->unsignedBigInteger('post_id')->nullable(); //->nullable() лишний;
            $table->unsignedBigInteger('likes')->default(0)->nullable(); //->nullable() лишний;
            $table->unsignedBigInteger('profile_id')->nullable(); //->nullable() лишний;

            $table->foreign('post_id','comments_post_fk')->on('posts')->references('id')->cascadeOnDelete();
            $table->foreign('profile_id','comments_profile_fk')->on('profiles')->references('id')->cascadeOnDelete();
            $table->foreign('parent_id','comments_parent_fk')->references('id')->on('comments')->cascadeOnDelete();

            $table->timestamps();

            $table->index('parent_id','comments_parent_id_index');
            $table->index('post_id','comments_post_id_index');
            $table->index('profile_id','comments_profile_id_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
