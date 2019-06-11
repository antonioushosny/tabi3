<?php

use Illuminate\Database\Seeder;
use App\Container;

class ContainersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i <= 20 ; $i++){

            Container::create([
    
                'name_ar' => 'خزان مياه '. $i,
                'name_en' => 'container '.$i,
                'size' => $i * 2,
                'desc_ar' => 'وصف عن خزان المياه '. $i,
                'desc_en' => 'container description  '.$i,
                'status' => 'active',
            ]);
        }
    }
}
