<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_applicants', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); 
            $table->string('email')->nullable();
            $table->string('date_signed')->nullable();
            $table->string('student_signature')->nullable();
            $table->string('parent_name')->nullable();
            $table->string('parent_date_signed')->nullable();
            $table->string('parent_signature')->nullable();
            $table->string('document')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_applicants');
    }
};
