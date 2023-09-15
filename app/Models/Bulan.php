<?php 

namespace App\Models; 

use Illuminate\Database\Eloquent\Model; 

class Bulan extends Model
{
	/**
	 * Table Name
	 * 
	 * @var string
	 */
	protected $table = 'app_bulan'; 

	/**
	 * Primary Key 
	 * 
	 * @var string
	 */
	protected $primaryKey = 'id';
}