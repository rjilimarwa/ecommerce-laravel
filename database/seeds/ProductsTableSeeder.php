<?php

use App\Product;
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

        Product::create([
            'name' => 'Laptop ',
            'slug' => 'laptop-',
            'details' => ' TB SSD, 32GB RAM',
            'price' =>149999,
            'description' =>'Lorem  ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
        ]);


        // Desktops

        Product::create([
            'name' => 'Desktop ' ,
            'slug' => 'desktop-' ,
            'details' =>' TB SSD, 32GB RAM',
            'price' =>249999,
            'description' => 'Lorem  ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
        ]);


        // Phones

        Product::create([
            'name' => 'Phone ',
            'slug' => 'phone-' ,
            'details' => ' inch screen, 4GHz Quad Core',
            'price' => 79999,
            'description' => 'Lorem  ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
        ]);


        // Tablets

        Product::create([
            'name' => 'Tablet ' ,
            'slug' => 'tablet-' ,
            'details' => ' inch screen, 4GHz Quad Core',
            'price' =>49999,
            'description' => 'Lorem  ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',

        ]);


        // TVs

        Product::create([
            'name' => 'TV ',
            'slug' => 'tv-' ,
            'details' => [46, 50, 60][array_rand([7, 8, 9])] . ' inch screen, Smart TV, 4K',
            'price' => rand(79999, 149999),
            'description' => 'Lorem   ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
        ]);


        // Cameras

        Product::create([
            'name' => 'Camera ' ,
            'slug' => 'camera-' ,
            'details' => 'Full Frame DSLR, with 18-55mm kit lens.',
            'price' => 79999,
            'description' => 'Lorem  ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
        ]);


        // Appliances

        Product::create([
            'name' => 'Appliance ' ,
            'slug' => 'appliance-' ,
            'details' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, dolorum!',
            'price' =>  149999,
            'description' => 'Lorem  ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
        ]);
    }



}