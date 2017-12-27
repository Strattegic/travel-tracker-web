<?php

use Illuminate\Database\Seeder;

class LocationsTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Location::where('show_on_map', true) -> delete();
        $locations = factory(App\Location::class, 15)->create([
          'user_id' => App\User::first() -> id
        ]);
    }
}
