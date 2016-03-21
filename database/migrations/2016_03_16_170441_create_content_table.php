<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('author');
            $table->integer('uploader_id');
            $table->date('release_date');
            $table->string('cover')->default('img/default-content.jpg');
            $table->integer('price')->unsigned();
            $table->string('file');
            $table->mediumText('description');
            $table->enum('type', ['Revista', 'Periodico', 'Libro', 'Catalogo']);
            $table->boolean('state')->default(true);
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
        Schema::drop('content');
    }
}
