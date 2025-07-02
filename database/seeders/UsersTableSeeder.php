<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'user_id' => 1,
            'nim' => '1062301',
            'name' => 'AdminAudric',
            'email' => 'admin@audric.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'setLevel' => '1',
            'setStatus' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
