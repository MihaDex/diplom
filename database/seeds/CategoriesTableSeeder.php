<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name'=>'Готовые дома'
        ]);
        DB::table('categories')->insert([
            'name'=>'Пиломатериалы'
        ]);
        DB::table('categories')->insert([
            'name'=>'Крепеж'
        ]);
        DB::table('categories')->insert([
            'name'=>'Смеси'
        ]);
        DB::table('categories')->insert([
            'name'=>'Блоки'
        ]);
        DB::table('categories')->insert([
            'name'=>'Металлопрокат'
        ]);
    }
}
