<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Member;
use App\Models\Category;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::create([
            'id' => 1,
            'name' => 'Magata',
            'email' => 'magata@gmail.com',
            'level' => 'member',
            'password' => bcrypt('magata')
        ]);

        User::create([
            'id' => 2,
            'name' => 'Wiwi and kokom',
            'email' => 'wiwi@gmail.com',
            'level' => 'member',
            'password' => bcrypt('wiwi')
        ]);

         User::create([
            'id' => 3,
            'name' => 'Admin',
            'email' => 'sajidan@gmail.com',
            'level' => 'admin',
            'password' => bcrypt('sajidan')
        ]);

        Member::create([
            'id' => 1,
            'name' => 'Magata',
            'nohp' => '082393355676',
            'address' => 'Singaparna',
            'users_id' => 1,
        ]);

        Member::create([
            'id' => 2,
            'name' => 'Sajidan',
            'nohp' => '082393355767',
            'address' => 'Cihaur',
            'users_id' => 2,
        ]);

        Category::create([
            'id' => 1,
            'name' => 'Kuah',
        ]);

        Category::create([
            'id' => 2,
            'name' => 'Goreng',
        ]);

        Category::create([
            'id' => 3,
            'name' => 'Minuman',
        ]);
        Category::create([
            'id' => 4,
            'name' => 'Dessert'
        ]);
        Product::create([
            'id' => 1,
            'name' => 'Cilok kuah 1 porsi lengkap',
            'price' => 10000,
            'descriptions' => 'Cilok kuah 1 porsi lengkap',
            'image' => 'keboard.jpg',
            'categories_id' => 1,
        ]);

        Product::create([
            'id' => 2,
            'name' => 'Cilok goreng 1 porsi',
            'price' => 7000000,
            'descriptions' => 'Per pcs 500',
            'image' => 'monitor.jpg',
            'categories_id' => 2,
        ]);

        Product::create([
            'id' => 3,
            'name' => 'Es teh manis',
            'price' => 4000,
            'descriptions' => 'lorem sajdhb jahhsdj jksahd',
            'image' => 'mouse.jpg',
            'categories_id' => 3,
        ]);

    }
}
