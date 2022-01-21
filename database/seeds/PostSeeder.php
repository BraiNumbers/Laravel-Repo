<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::Create([
            'id' => '1',
            'author_id' => '1',
            'title' => 'De seeder post',
            'intro' => 'De seeder intro',
            'description' => 'De post die met het seeden gemaakt is',
            'post_image' => 'https://www.canna.nl/sites/default/files/images/articles/nl/articles-kweken-voor-beginners_text_3.jpg',
        ]);
    }
}
