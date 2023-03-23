<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'joao',
            'user'      => 'user1',
            'password'  => '12345678',
            'document'     => '3131-3131',
            'email'     => 'joao@email.com'
        ]);
        User::create([
            'name'      => 'pedro',
            'user'      => 'user2',
            'password'  => '12345678',
            'document'     => '3232-3232',
            'email'     => 'pedro@email.com'
        ]);
        
    }
}
