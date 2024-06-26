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
        Schema::create('activitties_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activitties_id')
                    ->constrained();
            $table->foreignId('user_id')
                    ->constrained()
                    ->onDelete('CASCADE');
            $table->boolean('check')->nullable();
            $table->float('note')->nullable();
            $table->string('filepath')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('activitties_responses');
    }
};
