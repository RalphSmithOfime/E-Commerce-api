<?php

namespace Database\Seeders;
use App\Models\Model;
//use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Review;

use App\Models\User;
use Illuminate\Database\Seeder;

use \App\Models\Product;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //User::factory()->count(10)->create();
        $this->call(UserSeeder::class);
        Product::factory()->count(50)->create();
        Review::factory()->count(300)->create();
        
    }
}
