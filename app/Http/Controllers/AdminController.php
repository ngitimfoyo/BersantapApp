<?php


namespace App\Http\Controllers;

use App\ClientType;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;

class AdminController extends Controller {
	public function index() {
		return view ( 'forms.admin', compact ( 'types' ) );
	}
	public function create() {
		return redirect ( "admin" );
	}
}
