<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientType extends Model {
	
	// table name
	protected $table = 'client type';
	
	// fields to used
	protected $fillable = [ 
			'name' 
	];
	
	// relations
	public function clientdetail() {
		return $this->hasMany ( 'App\ClientDetail' );
	}
}
