<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class MapController extends Controller
{
  public function show( $userId, $id )
  {
  	// TODO: 
  	// - should the ID correspond to a specific map (which belongs to a user)?
  	// - should all locations be loaded depending on the ID only?

  	// The user decides if his map should be shared and with whom. So the first thing they do is tap the share button
  	// and send the link to somebody. After that the map is theoretically available for everyone to see, but only
  	// the one that has the link can actually access it.
  	// So the share link is user dependant and not location dependant.

    // dd( hash("sha1", time()) );

    $user = User::whereHas('locationSharing', function($query) use ($id){
      $query -> where('share_id', $id);
    })
    ->with(['journeys.locations'])
    ->find($userId);

    if( !empty( $user ) )
    {
      $locations = [];
      foreach( $user -> journeys[0] -> locations as $location )
      {
        $locations[] = ["lat" => intval($location->lat), "lng" => intval($location->lon)];
      }
    }

  	return view('map') -> with( ['user' => $user, 'locations' => $locations ] );
  }
}
