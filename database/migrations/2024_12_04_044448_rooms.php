<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id('roo_id');
            $table->foreignId('hot_id')->constrained('hotels', 'hot_id')->cascadeOnDelete();
            $table->foreignId('acc_id')->constrained('accommodations', 'acc_id')->cascadeOnDelete();
            $table->foreignId('rty_id')->constrained('room_types', 'rty_id')->cascadeOnDelete();
            $table->integer('roo_quantity');
            $table->boolean('roo_state')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};
