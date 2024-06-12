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
        Schema::table('users', function (Blueprint $table) {
            $table->string('status')->default('active');
            $table->bigInteger('phone_no');
            $table->string('address');
            $table->string('country');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->string('hobby');
            $table->string('profile');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('phone_no');
            $table->dropColumn('address');
            $table->dropColumn('country');
            $table->dropColumn('gender');
            $table->dropColumn('hobby');
            $table->dropColumn('profile');
        });
    }
};
