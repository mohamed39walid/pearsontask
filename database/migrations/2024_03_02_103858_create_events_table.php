<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->string('seats_number');
            $table->text('description');
            $table->boolean('is_individual');
            $table->integer('available_seats');
            $table->unsignedBigInteger('tournment_id');
            // $table->unsignedBigInteger('event_types_id');
            $table->timestamps();
            $table->foreign('tournment_id')->references('id')->on('tournments')->onDelete('cascade');
            // $table->foreign('event_types_id')->references('id')->on('event_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
