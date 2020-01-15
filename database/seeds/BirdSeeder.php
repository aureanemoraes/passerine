<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BirdSeeder extends Seeder
{
    public function run()
    {
        DB::table('birds')->insert(
            [
                'anilhaCode' => '123456as',
                'name' => 'akali',
                'age' => 2,
                'gender' => 'F',
                'category' => 'bicudo',
                'user_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );
        DB::table('birds')->insert(
            [
                'anilhaCode' => '789101as',
                'name' => 'shyvana',
                'age' => 1,
                'gender' => 'M',
                'category' => 'curio',
                'user_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );
        DB::table('birds')->insert(
            [
                'anilhaCode' => '121212as',
                'name' => 'karthus',
                'age' => 3,
                'gender' => 'M',
                'category' => 'bicudo',
                'user_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );
    }
}
