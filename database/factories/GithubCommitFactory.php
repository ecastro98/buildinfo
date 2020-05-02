<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\GithubCommit;
use Faker\Generator as Faker;

$factory->define(GithubCommit::class, function (Faker $faker) {
    return [
        'Revision' => 'r' . $faker->numberBetween(2000, 2010),
        'URL' => $faker->url,
        'LogMessage' => $faker->text(),
        'Date' => $faker->dateTime,
        'SHA' => $faker->sha256,
        'Author' => $faker->name,
        'AuthorAvatarURL' => $faker->imageUrl(),
        'AuthorURL' => $faker->url,
        'Version' => 'master',
    ];
});
