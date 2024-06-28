<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productcategories')->insert([
            'id'=>1,
            'name'=>'Makanan Hewan'
        ]);
        DB::table('productcategories')->insert([
            'id'=>2,
            'name'=>'Obat-obatan Hewan'
        ]);
    }
}
