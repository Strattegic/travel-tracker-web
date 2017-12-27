<?php

use Faker\Generator as Faker;

$factory->define(App\Location::class, function (Faker $faker) {
    return [
        'lat' => $faker -> latitude(30, 70),
        'lon' => $faker -> longitude(6, 50),
        'added_on' => $faker -> dateTimeAD(),
        'show_on_map' => true
    ];
});
