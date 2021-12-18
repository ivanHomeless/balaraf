<?php

use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
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
                'title' => 'Игры',
                'url' => '/games',
            ],
            [
                'title' => 'Скачать',
                'url' => '/download',
            ],
            [
                'title' => 'О проекте',
                'url' => '/about',
            ],
            [
                'title' => 'Контакты',
                'url' => '/contacts',
            ],
        ];
        DB::table('menu_items')->insert($data);
    }
}
