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
        Schema::create('reposts', function (Blueprint $table) {
            $table->id();
            $table->text('content');

            $table->unsignedBigInteger('profile_id')->nullable(); //->nullable() лишний;
            $table->unsignedBigInteger('post_id')->nullable(); //->nullable() лишний;


            $table->unique(['profile_id','post_id']);

            $table->foreign('profile_id','reposts_profile_id_fk')->references('id')->on('profiles')->cascadeOnDelete();
            $table->foreign('post_id','reposts_post_id_fk')->references('id')->on('posts')->cascadeOnDelete();

            $table->timestamps();

            $table->index('post_id','reposts_post_id_index');
            $table->index('profile_id','reposts_profile_id_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reposts');
    }
};
