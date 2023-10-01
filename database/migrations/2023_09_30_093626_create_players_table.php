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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address');
            $table->string('fathername');
            $table->string('mothername');
            $table->date('dob');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('aiffcrsid')->nullable();
            $table->foreignId('playercategory_id')->unsigned()->nullable();
            $table->date('contract_start');
            $table->date('contract_end');
            $table->string('contract_amount');
            $table->string('photo_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
