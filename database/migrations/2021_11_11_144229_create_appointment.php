<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->boolean('isActive')->default(0);
            $table->integer('clothes_id');
            $table->integer('repair_id');
            $table->integer('fabric_id');
            $table->dateTime('startDate');
            $table->dateTime('endDate');
            $table->decimal('totalAmount');
            $table->string('approvedBy');
            $table->string('auditUser');
            $table->dateTime('auditDate');
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
        Schema::dropIfExists('appointment');
    }
}
