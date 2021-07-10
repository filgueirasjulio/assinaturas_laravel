<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'Básico',
            'url' => 'dindigital/basic',
            'stripe_id' => "1",
            'price' => 20,
            'description' => 'Plano para iniciantes'
        ]);

        Plan::create([
            'name' => 'Express',
            'url' => 'dindigital/express',
            'stripe_id' => "2",
            'price' => 25,
            'description' => 'Plano ideal para você.'
        ]);
    }
}
