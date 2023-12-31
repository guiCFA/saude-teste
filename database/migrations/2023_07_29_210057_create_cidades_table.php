<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCidadesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('cidades', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('nome', 100);
      $table->string('estado', 100);
      $table->timestamps();
      $table->timestamp('deleted_at')->nullable(true);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('cidades');
  }
}
