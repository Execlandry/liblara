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
        Schema::create('books', function (Blueprint $table) {
            $table->integer('acc_no')->unique();
            $table->string('title')->unique();
            $table->string('edition');
            $table->year('year');
            $table->integer('pages');
            $table->string('source');
            $table->string('bill_no');
            $table->date('bill_date');
            $table->float('cost');
            $table->string('call_no');
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
        Schema::dropIfExists('books');
    }
};
