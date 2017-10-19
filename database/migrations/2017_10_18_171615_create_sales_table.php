<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');

            //Id do curso a ser comprado
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

            //Usuario que fez a compra
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            //Chave Hotmart
            $table->string('transaction');

            //Status possiveis de serem enviados pelo Hotmart pra gente
            $table->enum('status', [
                'started',
                'approved',
                'canceled',
                'pending_analysis',
                'billet_printed',
                'refunded',
                'dispute',
                'completed',
                'blocked',
                'chargeback',
                'delayed',
                'expired'
            ]);
            $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}