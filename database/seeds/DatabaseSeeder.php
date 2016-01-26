<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        DB::table('users')->insert([
            'username' => '16515183',
            'role' => 'admin',
            'password' => bcrypt('admin'),
        ]);             
    }
}
