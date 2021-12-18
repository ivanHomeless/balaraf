<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Card::class, function (Faker\Generator $faker) {
    if (rand(1, 2) == 1) {
        $img_back = 'public/media/img_back/test_img_back.png';
        $video = null;
    } else {
        $img_back = null;
        $video = 'public/media/video/test_video.mp4';
    }

    $data = [
        'letter' => str_random(1),
        'word' => $faker->word(),
        'translation' => $faker->word(),
        'img_front' => 'public/media/img_front/test_img_front.png',
        'img_back' => $img_back,
        'video' => $video,
        'sound' => 'public/media/sound/test_sound.mp3',
        'language_id' => rand(1, 6),
        'order' => rand(1, 10),
    ];

    return $data;
});

