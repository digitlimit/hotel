<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('room_type_id')->unique();//Room Type ID *Required
            $table->string('currency')->default('USD');  //Price Currency (e.g. USD)
            $table->decimal('amount', 19, 2)->default(0);  //Room price
            $table->enum('type', ['regular', 'dynamic'])->default('regular');//Price Types *Required
            //Weekday for Price
            $table->enum('weekday', [
                'Monday', 'Tuesday', 'Wednesday', 'Thursday',
                'Friday', 'Saturday', 'Sunday'
            ])->nullable();
            $table->date('date_from')->nullable();//Dynamic price date range : from
            $table->date('date_to')->nullable(); //Dynamic price date range : to
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
        Schema::dropIfExists('prices');
    }
}
