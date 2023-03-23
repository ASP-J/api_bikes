<?php

namespace Database\Seeders;

use App\Models\Bike;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BikeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bike::create([
            'client_id' => Client::first()->id,
            'user_id' => User::first()->id ,
            'quantity' => '2',
            'color' => 'blue',
            'status' => 'repairing',
            'price' => '10'


        ]);

    }
}
