<?php
// database/seeders/UserSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Perpus',
            'email' => 'admin@perpus.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Siswa Satu',
            'email' => 'siswa1@perpus.com',
            'password' => Hash::make('password'),
        ]);
    }
}
