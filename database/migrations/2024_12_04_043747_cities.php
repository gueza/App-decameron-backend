<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id('cit_id');
            $table->string('cit_name', 100);
            $table->boolean('cit_state')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cities');
    }
};
