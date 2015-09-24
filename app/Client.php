<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {

	// table name
	protected $table = 'client';

	// fields to used
	protected $fillable = [
			'guid',
			'status'
	];
	
	// exclude from JSON	
	protected $hidden = ['guid'];
}
