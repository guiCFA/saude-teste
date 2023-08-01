<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\CityService;
use App\Services\DoctorService;

use App\Http\Resources\CityResource;
use App\Http\Resources\DoctorResource;

use Exception;

class CityController extends Controller
{
  protected $cityService;
  protected $doctorService;

  public function __construct()
  {
    $this->cityService   = new CityService();
    $this->doctorService = new DoctorService();
  }

  public function index()
  {
    try
    {
      $filters = ['deleted_at' => null];

      $cities = $this->cityService->getAllCities($filters);
      return CityResource::collection($cities);
    }
    catch(Exception $e)
    {
      return response()->json([
        'error' => true,
        'data' => $e
      ]);
    }
  }

  public function getDoctors($id_cidade)
  {
    try
    {
      $filters = ['cidade_id' => $id_cidade, 'deleted_at' => null];

      $doctors = $this->doctorService->getAllDoctors($filters);
      return DoctorResource::collection($doctors);
    }
    catch(Exception $e)
    {
      return response()->json([
        'error' => true,
        'data' => $e
      ]);
    }
  }
}
