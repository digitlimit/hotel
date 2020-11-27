<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('room_id');//Room ID *Required
            $table->integer('user_id')->nullable(); //User ID
            $table->string('customer_fullname');//Customer's Full Name *Required
            $table->string('customer_email');//Customer's Full Name *Required
            //$table->integer('customer_id');//Customer ID *Required
            $table->dateTime('start_date');//Date Start
            $table->dateTime('end_date');//Date End
            $table->integer('total_nights');//Total nights
            $table->decimal('total_price', 19, 2)->default(0);//Total Price
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
        Schema::dropIfExists('bookings');
    }
}
