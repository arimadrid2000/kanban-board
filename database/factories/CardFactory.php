<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Card;
use Faker\Generator as Faker;

$factory->define(Card::class, function (Faker $faker) {
    $users = App\User::all();
    $panels = App\Panel::all();
    return [

        foreach ($users as $user) {
            DB::table('cards')
            ->where( 'cards.user_id', '=', $user->id)
            ->create();
            
        }
        foreach ($panels as $panel) {
            DB::table('cards')
            ->where( 'cards.panel_id', '=', $panel->id)
            ->create();
            
        }
    ];
});
