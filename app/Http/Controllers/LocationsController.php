<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Rules\LocationRule;
use Illuminate\Support\Facades\Auth;

class LocationsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index($journeyId)
  {
    return Location::where('journey_id', $journeyId) -> get();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request. $journeyId)
  {
    $validatedData = $request->validate([
      'lat' => ['required', new LocationRule],
      'lon' => ['required', new LocationRule]
    ]);

    $location = new Location();
    $location -> lat = $request -> get('lat');
    $location -> lon = $request -> get('lon');

    // each location remembers the next location in line
    // this way it is easy to identify the route the user has taken
    // even if he adds/removes different locations
    $location -> journey_id = $journeyId;
    $location -> user_id = 1;
    $location -> added_on = new \DateTime(); //TODO
    $location -> is_user_created = $request -> get('is_user_created');
    $location -> save();

    return $location;
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
