<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "Super Admin";
        $user->email = "admin@admin.com";
        $user->password = Hash::make('admin@123');
        $user->role = true;
        $user->save();

    }
}
