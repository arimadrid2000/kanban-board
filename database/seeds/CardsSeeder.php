<?php

use Illuminate\Database\Seeder;
use App\Card;


class CardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Card::class, 5)->create();

    }
}
