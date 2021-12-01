<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => '1',
            'name' => 'Andrea',
            'email' => 'Andrea@mail.com',
            'city' => 'Nunspeet',
            'password' => bcrypt('password'),
            'profile_image' => 'https://st3.depositphotos.com/4111759/13425/v/600/depositphotos_134255532-stock-illustration-profile-placeholder-male-default-profile.jpg'
        ]);
        User::create([
            'id' => '2',
            'name' => 'Bryan',
            'email' => 'Bryan@mail.com',
            'city' => 'Hoogeveen',
            'password' => bcrypt('password'),
            'profile_image' => 'https://st3.depositphotos.com/4111759/13425/v/600/depositphotos_134255532-stock-illustration-profile-placeholder-male-default-profile.jpg'
        ]);
        User::create([
            'id' => '3',
            'name' => 'Martijn',
            'email' => 'Martijn@mail.com',
            'city' => 'Groningen',
            'password' => bcrypt('password'),
            'profile_image' => 'https://st3.depositphotos.com/4111759/13425/v/600/depositphotos_134255532-stock-illustration-profile-placeholder-male-default-profile.jpg'
        ]);
        User::create([
            'id' => '4',
            'name' => 'Patrick',
            'email' => 'Patrick@mail.com',
            'city' => 'Groningen',
            'password' => bcrypt('password'),
            'profile_image' => 'https://st3.depositphotos.com/4111759/13425/v/600/depositphotos_134255532-stock-illustration-profile-placeholder-male-default-profile.jpg'
        ]);
        User::create([
            'id' => '5',
            'name' => 'Marco',
            'email' => 'MarcoPolo@mail.com',
            'city' => 'Nunspeet',
            'password' => bcrypt('password'),
            'profile_image' => 'https://st3.depositphotos.com/4111759/13425/v/600/depositphotos_134255532-stock-illustration-profile-placeholder-male-default-profile.jpg'
        ]);
    }
}
