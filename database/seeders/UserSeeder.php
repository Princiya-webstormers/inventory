<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Super Admin',
            'last_name' => 'Admin',
            'dob' => '1990-12-10',
            'address' => 'Main street',
            'mobile' => '9898978906',
            'city' => 'Chennai',
            'state' => 'Tamilnadu',
            'pincode' => '123456',
            'username' => 'super-admin',
            'type' => UserType::SUPERADMIN,
            'email' => 'super_admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
    }
}
