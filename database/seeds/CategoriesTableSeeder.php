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
            ['name' => 'Mobile phone', 'code' => 'Mobiles', 'description' => 'Description mobile phone','image' => 'categories/mobile.jpg'],
            ['name' => 'Portable technology', 'code' => 'portable', 'description' => 'Description portable technology','image' => 'categories/portable.jpg'],
            ['name' => 'Appliances technology', 'code' => 'technics', 'description' => 'Description for Appliances technology', 'image' => 'categories/appliance.jpg']
        ]);
    }
}
