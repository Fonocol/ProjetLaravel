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
        Schema::create('relationships', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('parent_id')->unsigned(); 
            $table->bigInteger('child_id')->unsigned();
            $table->timestamps(); 
        });

        // Ajouter les indices sur les colonnes created_by, parent_id et child_id
        Schema::table('relationships', function (Blueprint $table) {
            $table->index('created_by'); 
            $table->index('parent_id');  
            $table->index('child_id');  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relationships');
    }
};
