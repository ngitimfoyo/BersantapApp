<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientDetail extends Model {
	
	// table name
	protected $table = 'client detail';
	
	// fields to used
	protected $fillable = [ 
			'guid',
			'name',
			'latitude',
			'longitude',
			'type_id',
			'status_id' 
	];
	
	// The attributes excluded from the model's JSON form./
	protected $hidden = [ 
			'guid' 
	];
	
	// relations
	public function type() {
		return $this->belongsTo ( 'App\ClientType' );
	}
	public function status() {
		return $this->belongsTo ( 'App\Status' );
	}
}
