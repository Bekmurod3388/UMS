<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserSeeder extends Seeder {

    public function run() {
        User::query()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin')
        ]);
    }
}
