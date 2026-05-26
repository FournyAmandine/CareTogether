<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFactorsInUsersTable extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('profil_picture')->after('password')->nullable();
            $table->string('role')->after('first_name')->default('Utilisateur');
            $table->string('tel')->after('profil_picture')->nullable();
            $table->string('address')->after('tel')->nullable();
            $table->string('locality')->after('address')->nullable();
            $table->string('postal')->after('locality')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'profil_picture',
                'role',
                'address',
                'locality',
                'postal',
                'tel'
            ]);
        });
    }
}
