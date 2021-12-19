<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddLangueges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data = [
            [ 'id' => 1, 'name' => 'Татарский', 'alias' => 'tatar'],
            [ 'id' => 2, 'name' => 'Марийский', 'alias' => 'mari'],
            [ 'id' => 3, 'name' => 'Чувашский', 'alias' => 'chuvash'],
            [ 'id' => 4, 'name' => 'Эрзя(мордовский)', 'alias' => 'erzya'],
            [ 'id' => 5, 'name' => 'Мокша(мордовский)', 'alias' => 'moksha'],
            [ 'id' => 6, 'name' => 'Удмуртский', 'alias' => 'udmurt'],

        ];
        DB::table('languages')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
