<?php

namespace Database\Seeders;

use App\Enums\RoleType;
use App\Models\Role;
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
        $admin = User::create([
            'email'             => 'admin@gmail.com',
            'name'              => 'admin',
            'password'          => '123456',
            'phone'             => '0900000000',
            'gender'            => null,
            'date_of_birth'     => null,
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
        ]);
        // assign admin role to admin
        $admin->syncRoles(Role::where('name', RoleType::ADMIN)->first());

        User::factory(5)->create()->each(function ($staff){
            $staff->syncRoles(Role::where('name', RoleType::MANAGER)->first());
        });
        User::factory(14)->create();
    }
}
