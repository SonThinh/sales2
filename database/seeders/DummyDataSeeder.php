<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(19)->create();
        User::create([
            'email'             => 'admin@gmail.com',
            'name'              => 'admin',
            'password'          => '123456',
            'phone'             => '0900000000',
            'gender'            => null,
            'date_of_birth'     => null,
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
        ]);
    }
}
