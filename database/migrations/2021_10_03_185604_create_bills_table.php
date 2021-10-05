<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
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
            $table->decimal('amount', 10, 2);
            $table->decimal('paid', 10, 2);
            $table->decimal('rate', 10, 2);
            $table->enum('status', ['paid', 'unpaid'])->default('unpaid');
            $table->date('reading_date');
            $table->date('disconnection_date');
            $table->date('due_date');
            $table->string('image');    
            $table->integer('consumer_id');
            $table->integer('user_id');
            $table->string('user_name');
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
}
