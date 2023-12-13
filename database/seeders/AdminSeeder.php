<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->firstOrCreate(
            [
                'email' => config('admin.email'),
            ],
            [
                'name' => config('admin.name'),
                'email' => config('admin.email'),
                'password' => Hash::make(config('admin.password'))
            ]
        );
    }
}
