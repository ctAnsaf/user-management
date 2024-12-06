<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('fk_department')->constrained('departments');
            $table->foreignId('fk_designation')->constrained('designations');
            $table->string('phone_number');
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'name' => 'Ansaf',
                'fk_department' => 1,
                'fk_designation' => 1,
                'phone_number' => '1234567457',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Arjun',
                'fk_department' => 2,
                'fk_designation' => 2,
                'phone_number' => '9876843210',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Priya',
                'fk_department' => 3,
                'fk_designation' => 3,
                'phone_number' => '9876843210',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Ramu',
                'fk_department' => 3,
                'fk_designation' => 2,
                'phone_number' => '9876843210',
                'created_at' => now(),
                'updated_at' => now()
            ]


        ]);

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
