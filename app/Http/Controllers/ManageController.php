<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ManageController extends Controller {
	
	// Show home page of Manage
	public function index() {
		return view ( 'manage.show' );
	}
}
