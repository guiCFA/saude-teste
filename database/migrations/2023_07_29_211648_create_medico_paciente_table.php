<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicoPacienteTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('medico_paciente', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('medico_id');
      $table->unsignedBigInteger('paciente_id');
      $table->timestamps();
      $table->timestamp('deleted_at')->nullable(true);

      $table->foreign('medico_id')->references('id')->on('medico')->onDelete('cascade');
      $table->foreign('paciente_id')->references('id')->on('paciente')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('medico_paciente', function (Blueprint $table) {
      $table->dropColumn('medico_id');
      $table->dropColumn('paciente_id');
    });
  }
}
