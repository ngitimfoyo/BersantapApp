<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model {
	
	// table name
	protected $table = 'status';
	
	// fields to used
	protected $fillable = [ 
			'name' 
	];
	
	// relations
	public function clientdetail() {
		return $this->hasMany ( 'App\ClientDetail' );
	}
}
