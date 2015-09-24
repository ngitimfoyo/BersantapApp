<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller {
	public function getPlaces() {
		$lat = Input::get ( 'lat' ); // latitude
		$lon = Input::get ( 'lon' ); // longitude
		$dist = Input::get ( 'dist' ); // distance in KM
		$amt = Input::get ( 'amt' ); // amount of places
		
		$sql = "CALL GetPlaces (" . $lat . ","
								  . $lon . ","
								  . $dist . ","
								  . $amt . ")";
		
		$places = DB::select(DB::raw($sql));
		
		return $places;
	}
}
