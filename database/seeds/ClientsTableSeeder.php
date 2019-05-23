<?php

use Illuminate\Database\Seeder;

use App\Client;
class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('123456');
        $i = 0;
        do{
            $name = str_random(6);

        Client::create([
                'name' => $name,
                'email' => $name.'@gmail.com',
                'password' => $password,
                'mobile' => '012'.rand(11111111, 99999999),
                'status' => '1',
            ]);
            $i ++ ;
        }while($i != 10);
        
    }
}
