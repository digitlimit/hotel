<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('hotel_id');//Hotel ID : [room belongsTo hotel]
            $table->integer('room_type_id');//Room Type : ID of room type [room hasOne room_type]
            $table->string('name');//Room Name (e.g. A1, B2, C4)
            //@todo create room capacities table
            //$table->integer('room_capacity_id');//Room Capacity : ID of room capacity [room hasOne room_capacity]
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
