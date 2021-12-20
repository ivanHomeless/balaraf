<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\Models\Card::class, 160)->create();
        $this->call(PageSeeder::class);
        $this->call(MenuItemSeeder::class);
    }
}
