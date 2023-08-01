<?php

namespace App\Services;

use App\Repositories\CityRepository;

class CityService
{
  protected $cityRepository;

  public function __construct()
  {
    $this->cityRepository = new CityRepository();
  }

  public function getAllCities(array $filters)
  {
    $cityRepository = $this->cityRepository;

    $qb = $cityRepository->getAllCities($filters);

    return $qb->get();
  }
}
