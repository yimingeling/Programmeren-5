<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->smallInteger('year');
            $table->string('studio');
            $table->boolean('active');
            $table->bigInteger('user');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::drop('games');

    }
};
