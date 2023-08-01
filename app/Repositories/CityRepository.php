<?php

namespace App\Repositories;

use App\Models\City;

class CityRepository
{
  public function getAllCities(array $filters)
  {
    $query = City::where($filters);

    return $query;
  }
}
