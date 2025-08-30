<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     * repost
     * answer
     * author
     * body
     * chat
     */
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('body');

            $table->unsignedBigInteger('parent_message_id')->nullable();
            $table->unsignedBigInteger('post_id')->nullable();
            $table->unsignedBigInteger('profile_id')->nullable(); //->nullable() лишний;
            $table->unsignedBigInteger('chat_id')->nullable(); //->nullable() лишний;

            $table->foreign('post_id','messages_post_id_fk')->references('id')->on('posts');
            $table->foreign('profile_id','messages_profile_id_fk')->references('id')->on('profiles')->cascadeOnDelete();
            $table->foreign('chat_id','messages_chat_id_fk')->references('id')->on('chats')->cascadeOnDelete();
            $table->foreign('parent_message_id','messages_parent_fk')->references('id')->on('messages')->cascadeOnDelete();

            $table->timestamps();

            $table->index('post_id','messages_post_id_index');
            $table->index('profile_id','messages_profile_id_index');
            $table->index('chat_id','messages_chat_id_index');
            $table->index('parent_message_id','messages_parent_message_id_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }

};
