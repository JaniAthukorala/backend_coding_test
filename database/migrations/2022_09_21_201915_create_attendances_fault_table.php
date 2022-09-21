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
        Schema::create('attendances_fault', function (Blueprint $table) {
            $table->primary(['emp_id', 'shft_id', 'loc_id', 'att_date']);
            $table->unsignedBigInteger('emp_id');
            $table->foreign('emp_id')->references('id')->on('employees')->onDelete('cascade');
            $table->unsignedBigInteger('shft_id');
            $table->foreign('shft_id')->references('id')->on('shifts')->onDelete('cascade');
            $table->unsignedBigInteger('loc_id');
            $table->foreign('loc_id')->references('id')->on('locations')->onDelete('cascade');
            $table->date('att_date');
            $table->string('faulty', 60);
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
        Schema::dropIfExists('attendances_fault');
    }
};
