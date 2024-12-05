<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('room_type_accommodation', function (Blueprint $table) {
            $table->id('rta_id');
            $table->foreignId('rty_id')->constrained('room_types', 'rty_id')->onDelete('cascade');
            $table->foreignId('acc_id')->constrained('accommodations', 'acc_id')->onDelete('cascade');
            $table->tinyInteger('rta_state')->default(1);
            $table->unique(['rty_id', 'acc_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('room_type_accommodation');
    }
};
