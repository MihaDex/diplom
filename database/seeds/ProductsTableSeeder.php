<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'title'=>'Дом "Уют"',
            'image'=>'/public/images/houses/yuit.jpg',
            'description'=>'Готовый дом "Уют" - все о чем вы мечтали!',
            'price'=>1234567.00,
            'categorie_id'=>1
        ]);
    }
}
