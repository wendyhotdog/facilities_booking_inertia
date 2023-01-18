<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Facility::factory()->create([
            'name' => 'IOI City Mall',
            'description' => 'IOI City, Putrajaya',
        ]);
        \App\Models\Facility::factory()->create([
            'name' => 'Sportsplanet',
            'description' => 'Subang Jaya Selangor'
        ]);
        \App\Models\Facility::factory()->create([
            'name' => 'Gem-In Mall',
            'description' => 'Cyberjaya,Selangor'
        ]);
    }
}
