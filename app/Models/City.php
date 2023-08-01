<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  use HasFactory;

  protected $table      = 'cidades';
  protected $fillable   = ['nome', 'estado', 'deleted_at'];

  public function medico()
  {
    return $this->hasMany(Doctor::class);
  }
}
