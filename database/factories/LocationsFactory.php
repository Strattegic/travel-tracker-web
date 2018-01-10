<?php

use Faker\Generator as Faker;

$factory->define(App\Location::class, function (Faker $faker) {
    return [
        'lat' => floor($faker -> latitude(30, 70)*pow(10, 5))/pow(10, 5), //5 decimals
        'lon' => floor($faker -> latitude(6, 50)*pow(10, 5))/pow(10, 5), //5 decimals
        'added_on' => $faker -> dateTimeAD(),
        'show_on_map' => true
    ];
});