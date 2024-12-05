<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id('hot_id');
            $table->string('hot_name', 150);
            $table->integer('hot_quantity_rooms');
            $table->foreignId('cit_id')->constrained('cities', 'cit_id')->cascadeOnDelete();
            $table->string('hot_address', 150);
            $table->string('hot_nit', 20)->unique();
            $table->boolean('hot_state')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hotels');
    }
};
