<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateClientdetailTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create ( 'client detail', function (Blueprint $table) {
			$table->integer ( 'id', true, true );
			$table->string ( 'guid' );
			$table->string ( 'name' );
			$table->string ( 'latitude' );
			$table->string ( 'longitude' );
			$table->integer ( 'type_id' )->unsigned ();
			$table->integer ( 'status_id' )->unsigned ();
			$table->timestamps ();
			
			$table->foreign ( 'status_id' )->references ( 'id' )->on ( 'status' );
			$table->foreign ( 'type_id' )->references ( 'id' )->on ( 'client type' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop ( 'client detail' );
	}
}
