<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            [
                'name' => 'iPhone X 64GB',
                'code' => 'iphone_x_64',
                'description' => 'Nice phone 64 gb',
                'price' => '71990',
                'category_id' => 1,
                'image' => 'products/iphone_x.jpg',
                'count' => rand(0,10),
            ],
            [
                'name' => 'iPhone X 256GB',
                'code' => 'iphone_x_256',
                'description' => 'Nice phone 256 gb',
                'price' => '89990',
                'category_id' => 1,
                'image' => 'products/iphone_x2_silver.jpg',
                'count' => rand(0,10),
            ],
            [
                'name' => 'HTC One S',
                'code' => 'htc_one_s',
                'description' => 'Legendary HTC One S',
                'price' => '12490',
                'category_id' => 1,
                'image' => 'products/htc_one_s.png',
                'count' => rand(0,10),
            ],
            [
                'name' => 'iPhone 5SE',
                'code' => 'iphone_5se',
                'description' => 'Nice classical iPhone',
                'price' => '17221',
                'category_id' => 1,
                'image' => 'products/iphone_5.jpg',
                'count' => rand(0,10),
            ],
            [
                'name' => 'Headphone Beats Audio',
                'code' => 'beats_audio',
                'description' => 'Nice Headphone',
                'price' => '20221',
                'category_id' => 2,
                'image' => 'products/beats.jpg',
                'count' => rand(0,10),
            ],
            [
                'name' => 'Camera GoPro',
                'code' => 'gopro',
                'description' => 'Capture your highlights with this camera',
                'price' => '12000',
                'category_id' => 2,
                'image' => 'products/gopro.jpg',
                'count' => rand(0,10),
            ],
            [
                'name' => 'Camera Panasonic HC-V770',
                'code' => 'panasonic_hc-v770',
                'description' => 'Serious video shooting requires a serious camera. Panasonic HC-V770 is the best choice for these purposes!',
                'price' => '27900',
                'category_id' => 2,
                'image' => 'products/video_panasonic.jpg',
                'count' => rand(0,10),
            ],
            [
                'name' => 'Coffee machine DeLongi',
                'code' => 'delongi',
                'description' => 'A good morning starts with good coffee!',
                'price' => '40200',
                'category_id' => 3,
                'image' => 'products/delongi.jpg',
                'count' => rand(0,10),
            ],
            [
                'name' => 'cooler Haier',
                'code' => 'haier',
                'description' => 'For a large family, a large cooler!',
                'price' => '40200',
                'category_id' => 3,
                'image' => 'products/haier.jpg',
                'count' => rand(0,10),
            ],
            [
                'name' => 'Blender Moulinex',
                'code' => 'moulinex',
                'description' => 'For the most daring ideas',
                'price' => '4200',
                'category_id' => 3,
                'image' => 'products/moulinex.jpg',
                'count' => rand(0,10),
            ],
            [
                'name' => 'Meat grinder Bosch',
                'code' => 'bosch',
                'description' => 'Do you like homemade cutlets? You should definitely take a look at this meat grinder!',
                'price' => '9200',
                'category_id' => 3,
                'image' => 'products/bosch.jpg',
                'count' => rand(0,10),
            ],
        ]);
    }
}
