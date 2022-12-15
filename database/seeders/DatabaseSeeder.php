<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\DisciplinesSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(DisciplinesSeeder::class);

        DB::table('disciplines')->insert([
            'name' => 'Saskaitīšana',
            'short_name' => 'add',
            'numbers_type' => 'natural',
        ]);
        DB::table('disciplines')->insert([
            'name' => 'Atņemšana',
            'short_name' => 'sub',
            'numbers_type' => 'natural',
        ]);
        DB::table('disciplines')->insert([
            'name' => 'Reizināšana',
            'short_name' => 'mul',
            'numbers_type' => 'natural',
        ]);
        DB::table('disciplines')->insert([
            'name' => 'Dalīšana',
            'short_name' => 'div',
            'numbers_type' => 'natural',
        ]);
        DB::table('disciplines')->insert([
            'name' => 'Saskaitīšana un atņemšana',
            'short_name' => 'add_sub',
            'numbers_type' => 'natural',
        ]);
        DB::table('disciplines')->insert([
            'name' => 'Reizināšana un dalīšana',
            'short_name' => 'mul_div',
            'numbers_type' => 'natural',
        ]);
        DB::table('disciplines')->insert([
            'name' => 'Visas darbības',
            'short_name' => 'all',
            'numbers_type' => 'natural',
        ]);
        DB::table('disciplines')->insert([
            'name' => 'Salīdzināšana',
            'short_name' => 'com',
            'numbers_type' => 'natural',
        ]);
        DB::table('disciplines')->insert([
            'name' => 'Ailīšu aizpildīšana',
            'short_name' => 'fie',
            'numbers_type' => 'natural',
        ]);
        DB::table('disciplines')->insert([
            'name' => 'Kāpināšana',
            'short_name' => 'cli',
            'numbers_type' => 'natural',
        ]);
        DB::table('disciplines')->insert([
            'name' => 'Kvadrātsaknes',
            'short_name' => 'squ',
            'numbers_type' => 'natural',
        ]);
        DB::table('disciplines')->insert([
            'name' => 'Saskaitīšana',
            'short_name' => 'add',
            'numbers_type' => 'integer',
        ]);
        DB::table('disciplines')->insert([
            'name' => 'Atņemšana',
            'short_name' => 'sub',
            'numbers_type' => 'integer',
        ]);
        DB::table('disciplines')->insert([
            'name' => 'Reizināšana',
            'short_name' => 'mul',
            'numbers_type' => 'integer',
        ]);
        DB::table('disciplines')->insert([
            'name' => 'Dalīšana',
            'short_name' => 'div',
            'numbers_type' => 'integer',
        ]);
        DB::table('disciplines')->insert([
            'name' => 'Saskaitīšana un atņemšana',
            'short_name' => 'add_sub',
            'numbers_type' => 'integer',
        ]);
        DB::table('disciplines')->insert([
            'name' => 'Reizināšana un dalīšana',
            'short_name' => 'mul_div',
            'numbers_type' => 'integer',
        ]);
        DB::table('disciplines')->insert([
            'name' => 'Visas darbības',
            'short_name' => 'all',
            'numbers_type' => 'integer',
        ]);
        DB::table('disciplines')->insert([
            'name' => 'Saskaitīšana',
            'short_name' => 'add',
            'numbers_type' => 'decimal',
        ]);
        DB::table('disciplines')->insert([
            'name' => 'Atņemšana',
            'short_name' => 'sub',
            'numbers_type' => 'decimal',
        ]);
        DB::table('disciplines')->insert([
            'name' => 'Reizināšana',
            'short_name' => 'mul',
            'numbers_type' => 'decimal',
        ]);
        DB::table('disciplines')->insert([
            'name' => 'Dalīšana',
            'short_name' => 'div',
            'numbers_type' => 'decimal',
        ]);
        DB::table('disciplines')->insert([
            'name' => 'Saskaitīšana un atņemšana',
            'short_name' => 'add_sub',
            'numbers_type' => 'decimal',
        ]);
        DB::table('disciplines')->insert([
            'name' => 'Reizināšana un dalīšana',
            'short_name' => 'mul_div',
            'numbers_type' => 'decimal',
        ]);
        DB::table('disciplines')->insert([
            'name' => 'Visas darbības',
            'short_name' => 'all',
            'numbers_type' => 'decimal',
        ]);
    }
}
