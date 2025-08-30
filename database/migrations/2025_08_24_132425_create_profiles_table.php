<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Profile
     * name+
     * gender+
     * country+
     * birthed_at+
     * is_married
     * avatar
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('name');
            $table->string('gender');
            $table->string('country');
            $table->date('date_of_birth');
            $table->string('marital_status')->nullable();
            $table->string('avatar')->nullable();

            $table->timestamps();

            $table->unsignedBigInteger('user_id')->nullable(); //->nullable() лишний

            $table->index('user_id','profile_user_id_index');
            $table->foreign('user_id','profile_user_id_fk')->references('id')->on('users')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
