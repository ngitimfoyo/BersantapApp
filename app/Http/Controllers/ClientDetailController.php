<?php namespace App\Http\Controllers;

use App\ClientDetail;
use App\ClientType;
use App\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientDetailRequest;

class ClientDetailController extends Controller {
	
	/* 
	 * View home page of ClientDetail
	 */
	public function index() {
		$clientdetail = ClientDetail::all ();
		
		return view ( 'clientdetail.show', compact ( 'clientdetail' ) );
	}
	
	
	/* 
	 * View page for create new ClientDetail
	 */
	public function create() {
		// client type
		$types = $this::getType ();
		
		if (count ( $types ) > 0)
			array_unshift ( $types, '-- choose --' );
		
		$types = count ( $types ) > 0 ? $types : array ();
		
		// status
		$statuses = $this::getStatus ();
		
		if (count ( $statuses ) > 0)
			array_unshift ( $statuses, '-- choose --' );
		
		$statuses = count ( $statuses ) > 0 ? $statuses : array ();
		
		// combine
		return view ( 'clientdetail.create', compact ( 'types', 'statuses' ) );
	}
	
	
	/* 
	 * View page for edit ClientDetail based on $id
	 */
	public function edit($id) {
		$clientdetail = ClientDetail::findOrFail ( $id );
		$types = $this::getType ();
		$statuses = $this::getStatus ();
		
		return view ( 'clientdetail.update', compact ( 'clientdetail', 'types', 'statuses' ) );
	}
	
	
	/* 
	 * Save ClientDetail
	 */
	public function store(ClientDetailRequest $request) {
		ClientDetail::create ( $request->all() );
		
		return redirect ( "manage/clientdetail" );
	}
	
	
	/* 
	 * Update ClientDetail
	 */
	public function update($id, ClientDetailRequest $request) {
		$clientdetail = ClientDetail::findOrFail ( $id );
		
		$clientdetail->update ( $request->all() );
		
		return redirect ( 'manage/clientdetail' );
	}
	
	
	/////////// Private Methods
	
	/* 
	 * Get status list
	 */
	function getStatus() {
		return Status::all ()->lists ( 'name', 'id' );
	}
	
	
	/* 
	 * Get type list
	 */
	function getType() {
		return ClientType::all ()->lists ( 'name', 'id' );
	}
}
