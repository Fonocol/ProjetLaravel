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
        Schema::create('people', function (Blueprint $table) {
            $table->id(); 
            $table->bigInteger('created_by')->unsigned(); 
            $table->string('first_name', 255)->collation('utf8mb4_unicode_ci');
            $table->string('last_name', 255)->collation('utf8mb4_unicode_ci'); 
            $table->string('birth_name', 255)->nullable()->collation('utf8mb4_unicode_ci'); 
            $table->string('middle_names', 255)->nullable()->collation('utf8mb4_unicode_ci');
            $table->date('date_of_birth')->nullable(); 
            $table->timestamps();
        });

       
        Schema::table('people', function (Blueprint $table) {
            $table->index('created_by'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
