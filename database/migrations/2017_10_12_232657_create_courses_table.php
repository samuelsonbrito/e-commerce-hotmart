<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');

            //Relacionamento do curso com as categorias
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            //Relacionamento do curso com os usuarios
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('name', 150);
            $table->string('url', 20)->unique();
            $table->text('description')->nullable();
            $table->string('image', 200);
            $table->integer('code')->unique();
            $table->time('total_hours');
            $table->boolean('published');
            $table->boolean('free')->default(false);
            $table->double('price', 10, 2);
            $table->double('price_plots', 10, 2);//Valor das parcelas
            $table->integer('total_plots');//Total de parcelas
            $table->string('link_buy');
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
        Schema::dropIfExists('courses');
    }
}
