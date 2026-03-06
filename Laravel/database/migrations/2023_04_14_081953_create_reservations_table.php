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
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id('Reservation_Id');
            $table->unsignedBigInteger('Customer_Id');
            $table->unsignedBigInteger('Room_Number');
            $table->foreign('Customer_Id')->references('Customer_Id')->on('customers');
            $table->foreign('Room_Number')->references('Room_Number')->on('rooms');
            $table->date('Check_In');
            $table->date('Check_Out');
            $table->string('Status');
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
        Schema::dropIfExists('reservations');
    }
};
