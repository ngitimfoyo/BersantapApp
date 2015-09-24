<?php


namespace App\Http\Controllers;

use App\Status;
use App\Http\Requests\StatusRequest;
use App\Http\Controllers\Controller;
use Request;

class StatusController extends Controller {
	
	/* 
	 * Show home page of Status
	 */
	public function index() {
		$statuses = Status::latest ()->get ();
		
		return view ( 'status.show', compact ( 'statuses' ) );
	}
	
	
	/* 
	 * View page for create new Status
	 */
	public function create() {
		return view ( 'status.create' );
	}
	
	
	/* 
	 * View page for edit Status based on $id
	 */
	public function edit($id) {
		$status = Status::findOrFail ( $id );
		
		return view ( 'status.update', compact ( 'status' ) );
	}
	
	
	/* 
	 * Save Status
	 */
	public function store(StatusRequest $request) {		
		Status::create ( $request->all() );
		
		return redirect ( "manage/status" );
	}
	
	
	/* 
	 * Update Status
	 */
	public function update($id, StatusRequest $request) {
		// find specific Status		
		$status = Status::findOrFail ( $id );		
		
		$status->update ( $request->all() );
		
		return redirect ( 'manage/status' );
	}
}
