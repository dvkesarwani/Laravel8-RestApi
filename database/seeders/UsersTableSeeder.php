<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		User::create([
            'name' => 'deepika',
            'username' => 'superadmin',
			'password' => Hash::make('admin'),
            'email' => 'dvkesarwani@gmail.com'
        ]);
    }
}
