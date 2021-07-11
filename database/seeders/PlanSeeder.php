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
            'stripe_id' => "price_1IwxzsGAqeFLkvdLrNgsh5Us",
            'price' => 74,
            'description' => 'Plano para iniciantes'
        ]);

        Plan::create([
            'name' => 'Express',
            'url' => 'dindigital/express',
            'stripe_id' => "price_1Iwy4RGAqeFLkvdLER9sHKdr",
            'price' => 498,
            'description' => 'Plano ideal para você.'
        ]);
    }
}
