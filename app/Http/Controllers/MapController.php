<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class MapController extends Controller
{
  public function show( $id )
  {
  	// TODO: 
  	// - should the ID correspond to a specific map (which belongs to a user)?
  	// - should all locations be loaded depending on the ID only?

  	// The user decides if his map should be shared and with whom. So the first thing they do is tap the share button
  	// and send the link to somebody. After that the map is theoretically available for everyone to see, but only
  	// the one that has the link can actually access it.
  	// So the share link is user dependant andnot location dependant.

  	$user = User::where('share_id', $id)->with('locations')->first();
  	return view('map') -> with( ['user' => $user ] );
  }
}
