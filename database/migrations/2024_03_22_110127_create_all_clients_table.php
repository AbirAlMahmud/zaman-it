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
        Schema::create('all_clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('mobile_number');
            $table->string('email');
            $table->string('address');
            $table->string('service_name');
            $table->string('assign_person');
            $table->string('note');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('all_clients');
    }
};
