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
        App\Location::where('id', '<>', 0)->delete();
        App\Journey::where('user_id', '<>', 1) -> delete();

        $users = factory(App\User::class, 10)->create();
        foreach( $users as $user )
        {
          // 1,2 or 3 journeys based on luck
          $journeyCount = rand(1,3);
          for( $i = 1; $i <= $journeyCount; $i++ )
          {
            $journey = App\Journey::create(['name' => 'My Journey #'.$i, 'user_id' => $user -> id]);

            factory(App\Location::class, 10)->create([
              'journey_id' => $journey -> id
            ]);

            // some Location Sharings (3 deleted ones and 1 active)
            LocationSharing::create(['user_id' => $user -> id, 'share_id' => $this->generateShareId()]);
            LocationSharing::create(['user_id' => $user -> id,'share_id' => $this->generateShareId()]);
            LocationSharing::create(['user_id' => $user -> id,'share_id' => $this->generateShareId()]);
            LocationSharing::where('user_id', $user -> id)->delete();
            LocationSharing::create(['user_id' => $user -> id,'share_id' => $this->generateShareId()]);
          }
        }
    }

    public function generateShareId()
    {
      return hash("crc32", microtime());
    }
}
