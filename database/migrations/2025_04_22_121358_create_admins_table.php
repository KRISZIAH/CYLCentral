<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // /**
    //  * Run the migrations.
    //  */
    // public function up(): void
    // {
    //     Schema::create('admins', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  */
    // public function down(): void
    // {
    //     Schema::dropIfExists('admins');
    // }

    public function up(): void
        {
            Schema::create('admins', function (Blueprint $table) {
                $table->id();
                $table->string('email')->unique();
                $table->string('password');
                $table->timestamps();
            });

            // In a migration file (create a new one if needed)
            Schema::table('admins', function (Blueprint $table) {
                $table->string('name')->after('id');
            });

            if (!Schema::hasTable('admins')) {
                Schema::create('admins', function (Blueprint $table) {
                    // your columns
                });
            }
        }

};
