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
            'image' => "https://www.ioicitymall.com.my/data/images/item/img_5814810_slide2.jpg",
        ]);
        \App\Models\Facility::factory()->create([
            'name' => 'Sportsplanet',
            'description' => 'Subang Jaya Selangor',
            'image' => "https://media.timeout.com/images/101578307/image.jpg"
        ]);
        \App\Models\Facility::factory()->create([
            'name' => 'Gem-In Mall',
            'description' => 'Cyberjaya,Selangor',
            'image' => "https://fastly.4sqi.net/img/general/600x600/15917023_cN2psxxhSYekGhM_3WvnMjD-2b9MhPxSChLceFzIn1Q.jpg"
        ]);
        \App\Models\Facility::factory()->create([
            'name' => 'Prima Avenue',
            'description' => 'Cyberjaya,Selangor',
            'image' => "https://lh5.googleusercontent.com/p/AF1QipO2wzFV9nQ1s9MYWiahHBesjc40BxrxBcOGGpDk=w480-h300-k-n"
        ]);
    }
}
