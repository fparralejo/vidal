<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model {

	protected $table = 'anuncio';

	protected $primaryKey = "idAnuncio";

	public $timestamps = false;
        
}
