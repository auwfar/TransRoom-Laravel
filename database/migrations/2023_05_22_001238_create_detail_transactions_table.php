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
    public function up() {
        Schema::create('detail_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('trans_id');
            $table->integer('room_id');
            $table->integer('days');
            $table->integer('sub_total_room');
            $table->integer('extra_charge');
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
        Schema::dropIfExists('detail_transactions');
    }
};
