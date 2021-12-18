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
            [ 'id' => 2, 'name' => 'Мордовский(мокша)', 'alias' => 'moksha'],
            [ 'id' => 3, 'name' => 'Мордовский(эрзя)', 'alias' => 'erzya'],
            [ 'id' => 4, 'name' => 'Марийский', 'alias' => 'mari'],
            [ 'id' => 5, 'name' => 'Удмуртский', 'alias' => 'udmurt'],
            [ 'id' => 6, 'name' => 'Чувашский', 'alias' => 'chuvash'],
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
