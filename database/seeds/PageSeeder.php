<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => 'Скачать',
                'slug' => 'download',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, earum esse explicabo ipsum itaque voluptate. Aperiam beatae debitis, ex laudantium nisi optio ut! Blanditiis dicta ducimus necessitatibus sed? Assumenda, sed.',
                'seo_title' => 'Скачать',
                'seo_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem ea eaque eos molestias non tenetur?',
                'seo_keywords' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem ea eaque eos molestias non tenetur?',
            ],
            [
                'title' => 'О проекте',
                'slug' => 'about',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, earum esse explicabo ipsum itaque voluptate. Aperiam beatae debitis, ex laudantium nisi optio ut! Blanditiis dicta ducimus necessitatibus sed? Assumenda, sed.',
                'seo_title' => 'О проекте',
                'seo_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem ea eaque eos molestias non tenetur?',
                'seo_keywords' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem ea eaque eos molestias non tenetur?',
            ],
            [
                'title' => 'Контакты',
                'slug' => 'contacts',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, earum esse explicabo ipsum itaque voluptate. Aperiam beatae debitis, ex laudantium nisi optio ut! Blanditiis dicta ducimus necessitatibus sed? Assumenda, sed.',
                'seo_title' => 'Контакты',
                'seo_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem ea eaque eos molestias non tenetur?',
                'seo_keywords' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem ea eaque eos molestias non tenetur?',
            ],
        ];
        DB::table('pages')->insert($data);
    }
}
