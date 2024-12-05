<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('room_types', function (Blueprint $table) {
            $table->id('rty_id');
            $table->string('rty_name', 50);
            $table->boolean('rty_state')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('room_types');
    }
};
