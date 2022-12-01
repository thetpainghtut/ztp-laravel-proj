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
        Schema::create('employeedetails', function (Blueprint $table) {
            $table->id();
            $table->text('address');
            $table->string('nrc')->unique();
            $table->integer('salary');
            $table->timestamps();
            $table->softDeletes();

            $table->unsignedBigInteger('employee_id');
 
            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employeedetails');
    }
};
