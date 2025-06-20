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
        Schema::table('jobs', function (Blueprint $table) {
            $table->string('qualifications')->after('responsibility');
            $table->integer('status')->default(1)->after('company_website');
            $table->integer('isFeatured')->after('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->string('qualifications');
            $table->integer('status');
            $table->integer('isFeatured');
        });
    }
};
