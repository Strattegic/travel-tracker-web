<?php

use Illuminate\Database\Seeder;
use App\LocationSharing;

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
            factory(App\Location::class, 10)->create([
              'user_id' => $user -> id
            ]);

            // some Location Sharings (3 deleted ones and 1 active)
            LocationSharing::create(['user_id' => $user -> id, 'share_id' => hash("sha512", microtime())]);
            LocationSharing::create(['user_id' => $user -> id,'share_id' => hash("sha512", microtime())]);
            LocationSharing::create(['user_id' => $user -> id,'share_id' => hash("sha512", microtime())]);
            LocationSharing::where('user_id', $user -> id)->delete();
            LocationSharing::create(['user_id' => $user -> id,'share_id' => hash("sha512", microtime())]);
        }
    }
}
