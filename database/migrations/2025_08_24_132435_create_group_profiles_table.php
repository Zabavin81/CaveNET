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
        Schema::create('group_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->index()->constrained('groups');
            $table->foreignId('profile_id')->index()->constrained('profiles');
            $table->string('role');
            $table->softDeletes();

            $table->timestamps();
            $table->unique(['group_id', 'profile_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_profiles');
    }
};
