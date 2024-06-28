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
        Schema::create('leadmanages', function (Blueprint $table) {
            $table->id();
            $table->string('Name')->unique;
            $table->string('Emailid')->unique;
            $table->integer('ContactNo')->unique;
            $table->string('ComapanyDetails')->unique;
            $table->text('Address')->unique;
            $table->integer('GSTNo')->unique;
            $table->string('Product')->unique;
            $table->string('EmployeeName')->unique;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leadmanages');
    }
};
