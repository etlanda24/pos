<?php

use Illuminate\Database\Seeder;
use App\user;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->delete();
        User::create(array(
            'name'     => 'Admin',
            'level' => 'admin',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ));
    }
}
