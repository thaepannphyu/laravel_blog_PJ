<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use   \App\Models\User;
use Faker\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // with db:seed command
        //truncate is just deleting the previous data created by seeder
        // User::truncate();
        // Category::truncate();
        // Blog::truncate();

        // \App\Models\User::factory(10)->create();

        // User::create(['name'=>"tiefm","email"=>"email@gmail.com",'password'=>"fsf"]);

        $mgmg = User::factory()->create(["name" => "mgmg", "username" => "mgmg", 'password' => "abcdefghijk", "is_admin" => 1]);
        $aungaung = User::factory()->create(["name" => "aungaung", "username" => "ungaung"]);
        $frontend = Category::factory()->create(["name" => "frontend", "slug" => "frontend"]);
        $backend = Category::factory()->create(["name" => "backend", "slug" => "backend"]);



        Blog::factory(2)->create(["category_id" => $frontend->id, 'user_id' => $mgmg->id]);
        Blog::factory(2)->create(["category_id" => $backend->id, 'user_id' => $aungaung->id]);
    }
}
