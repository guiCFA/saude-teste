<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\DoctorPatient;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // \App\Models\User::factory(10)->create();

    \App\Models\City::factory(20)->create();
    \App\Models\Doctor::factory(15)->create();
    \App\Models\Patient::factory(60)->create();
    DoctorPatient::factory(100)->create();

    $this->call([
      UserSeeder::class,
    ]);
  }
}
