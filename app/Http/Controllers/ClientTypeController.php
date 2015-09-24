<?php


namespace App\Http\Controllers;

use App\ClientType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientTypeRequest;

class ClientTypeController extends Controller {
	
	/* 
	 * Show home page of ClientType
	 */
	public function index() {
		$types = ClientType::latest ()->get ();
		
		return view ( 'clienttype.show', compact ( 'types' ) );
	}
	
	
	/* 
	 * View page for create new ClientType
	 */
	public function create() {
		return view ( 'clienttype.create' );
	}
	
	
	/* 
	 * View page for edit ClientType based on $id
	 */
	public function edit($id) {
		$type = ClientType::findOrFail ( $id );
		
		return view ( 'clienttype.update', compact ( 'type' ) );
	}
	
	
	/* 
	 * Save ClientType
	 */
	public function store(ClientTypeRequest $request) {		
		ClientType::create ( $request->all() );
		
		return redirect ( "manage/clienttype" );
	}
	
	
	/* 
	 * Update ClientType
	 */
	public function update($id, ClientTypeRequest $request) {
		// find specific ClientType
		$type = ClientType::findOrFail ( $id );		
		
		$type->update ( $request->all() );
		
		return redirect ( 'manage/clienttype' );
	}
}
