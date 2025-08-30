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
        Schema::create('chat_profiles', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('chat_id')->nullable(); //->nullable() лишний;
            $table->unsignedBigInteger('profile_id')->nullable(); //->nullable() лишний;

            $table->string('role');

            $table->unique(['chat_id', 'profile_id']);

            $table->timestamps();

            $table->foreign('chat_id', 'chat_profiles_chat_id_fk')->references('id')->on('chats')->onDelete('cascade');
            $table->foreign('profile_id', 'chat_profiles_profile_id_fk')->references('id')->on('profiles')->cascadeOnDelete();

            $table->index('chat_id','chat_profiles_chat_id_index');
            $table->index('profile_id','chat_profiles_profile_id_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_profiles');
    }
};
