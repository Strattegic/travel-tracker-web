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
  public function index()
  {
    return Location::where('user_id', Auth::user() -> id) -> get();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'lat' => ['required', new LocationRule],
      'lon' => ['required', new LocationRule]
    ]);

    $location = new Location();
    $location -> lat = $request -> get('lat');
    $location -> lon = $request -> get('lon');
    $location -> user_id = 1;
    $location -> added_on = new \DateTime();
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
