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
            $table->unsignedBigInteger('group_id')->nullable(); //->nullable() лишний;
            $table->unsignedBigInteger('profile_id')->nullable(); //->nullable() лишний;
            $table->string('role');
            $table->timestamps();
            $table->unique(['group_id', 'profile_id']);

            $table->index('group_id','group_profiles_group_id_index');
            $table->index('profile_id','group_profiles_profile_id_index');
            $table->foreign('group_id', 'group_profiles_group_id_fk')->references('id')->on('groups')->cascadeOnDelete();
            $table->foreign('profile_id', 'group_profiles_profile_id_fk')->references('id')->on('profiles')->cascadeOnDelete();
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
