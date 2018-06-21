<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'code'           => 'M01',
            'name'           => 'Julio Maturrano',
            'email'          => 'jmaturrano@devitweb.com',
            'password'       => bcrypt('password'),
            'remember_token' => str_random(60)
        ]);

        User::create([
        	'code'           => 'M02',
            'name'           => 'Gerberth Contreras',
            'email'          => 'email@email.com',
            'password'       => bcrypt('password'),
            'remember_token' => str_random(60)
        ]);
    }
}
