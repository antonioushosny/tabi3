<?php

use Illuminate\Database\Seeder;

use App\Department;
class DepartmentsTableSeeder extends Seeder
{
    
     
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 10; $i++)
        {
            $department = Department::create([
                'name_ar' => $faker->word,
                'name_en' => $faker->word,
                'disc_ar' => $faker->sentence,
                'disc_en' => $faker->sentence,
                'image' => $faker->word . '.png',

            ]);

        }
    }
}
