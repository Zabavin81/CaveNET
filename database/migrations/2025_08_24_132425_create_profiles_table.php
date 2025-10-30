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
            $table->foreignId('user_id')->index()->constrained('users');
            $table->softDeletes();
            $table->timestamps();


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
