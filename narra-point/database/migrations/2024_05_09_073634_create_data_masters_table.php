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
        Schema::create('data_master', function (Blueprint $table) {
            $table->string('number_phone');
            $table->string('customer_name');
            $table->string('address');
            $table->string('gender');
            $table->integer('point')->default(0);
            $table->string('membership_level')->default('Classic');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_master');
    }
};
