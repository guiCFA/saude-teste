<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
  use HasFactory;

  protected $table      = 'medico';
  protected $fillable   = ['nome', 'especialidade', 'cidade_id', 'deleted_at'];

  public function cidade()
  {
    return $this->belongsTo(City::class);
  }

  public function pacientes()
  {
    return $this->hasMany(Patient::class);
  }
}
