<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rec=[
            ['category'=>'Sports'], ['category'=>'Religion'], ['category'=>'War'],
             ['category'=>'News'], ['category'=>'Trade'], ['category'=>'Travel'],
              ['category'=>'Education'], ['category'=>'IT'], ['category'=>'Export'],
        ];
        Category::insert($rec);
    }
}
