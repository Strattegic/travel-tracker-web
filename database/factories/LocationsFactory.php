<?php

use Faker\Generator as Faker;

$factory->define(App\Location::class, function (Faker $faker) {
    return [
        'lat' => $faker -> latitude(47, 54),
        'lon' => $faker -> longitude(6, 14),
        'added_on' => $faker -> dateTimeAD(),
        'show_on_map' => true
    ];
});
