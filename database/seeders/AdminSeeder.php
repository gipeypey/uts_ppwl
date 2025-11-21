<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
            'name' => 'Administrator',
            'password' => bcrypt('P@ssw0rd'),
            'role' => 'admin'
            ]
        );
    }
}
