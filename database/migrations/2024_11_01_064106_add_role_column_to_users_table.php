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
        // Menambahkan kolom 'role' ke tabel 'users' yang sudah ada
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user'); // Menambahkan kolom 'role' dengan nilai default 'user'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Menghapus kolom 'role' dari tabel 'users' jika rollback
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }

    //Super admin
    //Email :azkasalsa@gmail.com
    //Password:azkasalsabilah0804 
 
    // Admin
    //Email:salsa@gmail.com
    //Password:salsabilah0804
};
