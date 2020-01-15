<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'cpf' => '71573830046',
            'name' => 'maria',
            'gender' => 'F',
            'email' => 'maria@gmail.com',
            'age' => 25,
            'password' => bcrypt('12345678'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'cpf' => '98520312012',
            'name' => 'carlos',
            'gender' => 'M',
            'email' => 'carlos@gmail.com',
            'age' => 24,
            'password' => bcrypt('12345678a'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'cpf' => '49437170045',
            'name' => 'lucas ataíde',
            'gender' => 'M',
            'email' => 'lucas@gmail.com',
            'age' => 20,
            'password' => bcrypt('lucas1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

    }
}
