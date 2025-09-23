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

            $table->foreignId('parent_id')->nullable()->index()->constrained('messages');
            $table->foreignId('post_id')->index()->constrained('posts');
            $table->foreignId('chat_id')->index()->constrained('chats');
            $table->softDeletes();


            $table->timestamps();
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
