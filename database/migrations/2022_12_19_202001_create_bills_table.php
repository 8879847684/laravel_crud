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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->integer('creator');
            $table->enum('activity', ['iutn', 'inbound'])->nullable();
            $table->enum('transport_ame', ['Mahalaxmi Transport Service', 'Shree Laxmi Transport Service']);
            $table->string('lr_number');
            $table->date('lr_date');
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->enum('status', ['billed', 'unbilled'])->default('unbilled');
            $table->string('vehicle_no');
            $table->string('lr_submit_location');
            $table->string('contact_person')->nullable();
            $table->string('remark')->nullable();
            $table->string('bill_number')->nullable();
            $table->date('ba_date');
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
        Schema::dropIfExists('bills');
    }
};
