<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->boolean('status')->default(2);
            $table->integer('clothes_id');
            $table->integer('emp_id')->nullable();
            $table->integer('repair_id')->nullable();
            $table->integer('fabric_id')->nullable();
            $table->string('appointment_date');
            $table->decimal('totalAmount');
            $table->string('approvedBy')->nullable();
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
        Schema::dropIfExists('appointments');
    }
}
