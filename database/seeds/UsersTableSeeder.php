<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete(); //最初に全件削除

        User::create([
            'name' => 'aaa', 'email' => 'aaa@aaa.aaa', 'password' => Hash::make('aaaaaaaa'), 'created_at' => now()
        ]);

        User::create([
            'name' => 'bbb', 'email' => 'bbb@bbb.bbb', 'password' => Hash::make('bbbbbbbb'), 'created_at' => now()
        ]);
    }
}
