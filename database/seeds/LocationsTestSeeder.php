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

        App\User::where('id', '<>', 1) -> delete();
        App\Location::where('user_id', '<>', 1) -> delete();

        $users = factory(App\User::class, 10)->create();
        foreach( $users as $user )
        {
            $locations = factory(App\Location::class, 10)->create([
              'user_id' => $user -> id
            ]);
        }
    }
}
