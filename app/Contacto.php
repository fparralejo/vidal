<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model {

	protected $table = 'contacto';

	protected $primaryKey = "idContacto";

	public $timestamps = false;
        
}
