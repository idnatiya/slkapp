<?php 

namespace App\Models; 

use Illuminate\Database\Eloquent\Model; 

class Konfigurasi extends Model
{
	/**
	 * Table Name 
	 * 
	 * @var string
	 */
	protected $table = 'app_konfigurasi'; 

	/**
	 * Primary Key 
	 * 
	 * @var string
	 */
	protected $primaryKey = 'id'; 

	/**
	 * get Config 
	 * 
	 * @param  string $parameter 
	 * @return string 
	 */
	public function getConfig($parameter)
	{
		$row = Konfigurasi::where('parameter', $parameter)->first();
		if ($row) {
			return $row->value; 
		} 
	}

	/**
	 * Fillable 
	 * 
	 * @var array
	 */
	public $fillable = ['parameter', 'index']; 
}