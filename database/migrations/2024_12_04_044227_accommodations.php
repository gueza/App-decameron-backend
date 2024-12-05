<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('accommodations', function (Blueprint $table) {
            $table->id('acc_id');
            $table->string('acc_name', 50);
            $table->boolean('acc_state')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('accommodations');
    }
};
