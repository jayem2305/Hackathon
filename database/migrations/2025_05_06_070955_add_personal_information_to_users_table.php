<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('ext_name')->nullable();
            $table->date('dob')->nullable(); // Make dob nullable
            $table->string('phone_number');
            $table->text('address');
            $table->enum('role', ['admin', 'faculty_member'])->default('faculty_member');
            $table->string('profile_image')->nullable(); // Make profile_image nullable
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Remove the added columns if we roll back the migration
            $table->dropColumn([
                'first_name',
                'last_name',
                'dob',
                'phone_number',
                'address',
                'role',
                'profile_image',
            ]);
        });
    }
};
