<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Feature::create([  
            'plan_id' => 1,
            'name' => 'Básico Feature',
        ]);

        Feature::create([
            'plan_id' => 2,
            'name' => 'Express Feature',
        ]);
    }
}
