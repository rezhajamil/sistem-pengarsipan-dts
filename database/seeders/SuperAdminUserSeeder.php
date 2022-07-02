<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class SuperAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'super admin',
            'nik' => '123',
            'email' => 'super_admin@dts.com',
            'phone' => '123456789',
            'gender' => 'Pria',
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => \bcrypt('admin'),
            'role' => 1,
        ]);
    }
}
