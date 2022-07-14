<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::first();

        Post::firstOrCreate([
            'slug' => Str::slug('Sport')
        ],[
            'name' => 'Sport',
            'description' => 'Sport',
            'content' => 'Sport',
            'image' => 'image.jpg',
            'category_id' => $category->id,
            'outstanding' => 1,
            'status' => 1,
        ]);

        Post::firstOrCreate([
            'slug' => Str::slug('Sport 1')
        ],[
            'name' => 'Sport 1',
            'description' => 'Sport 1',
            'content' => 'Sport',
            'image' => 'image.jpg',
            'category_id' => $category->id,
            'outstanding' => 1,
            'status' => 1,
        ]);

        Post::firstOrCreate([
            'slug' => Str::slug('Sport 2')
        ],[
            'name' => 'Sport 2',
            'description' => 'Sport',
            'content' => 'Sport',
            'image' => 'image.jpg',
            'category_id' => $category->id,
            'outstanding' => 1,
            'status' => 1,
        ]);

        Post::firstOrCreate([
            'slug' => Str::slug('Sport 3')
        ],[
            'name' => 'Sport 3',
            'description' => 'Sport',
            'content' => 'Sport',
            'image' => 'image.jpg',
            'category_id' => $category->id,
            'outstanding' => 1,
            'status' => 1,
        ]);
    }
}
