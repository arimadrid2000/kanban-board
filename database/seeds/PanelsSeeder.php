<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class PanelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('panels')->insert([
            'name' => 'Buffer',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('panels')->insert([
            'name' => 'Working',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('panels')->insert([
            'name' => 'Done',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

    }
}
