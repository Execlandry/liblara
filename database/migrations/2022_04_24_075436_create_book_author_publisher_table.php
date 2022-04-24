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
        Schema::create('book_author_publisher', function (Blueprint $table) {

        
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')
                ->references('id')
                ->on('authors')
                ->cascade('delete');

            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')
                ->references('acc_no')
                ->on('books')
                ->cascade('delete');

            $table->unsignedBigInteger('publisher_id');
            $table->foreign('publisher_id')
                ->references('id')
                ->on('publishers')
                ->cascade('delete');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_author_publisher');
    }
};
