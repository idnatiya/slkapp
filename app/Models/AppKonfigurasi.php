<?php 

namespace App\Models; 

use Illuminate\Database\Eloquent\Model; 

class AppKonfigurasi extends Model
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
	 * Fillable Mask Assignment 
	 * 
	 * @var array
	 */
	public $fillable = ['parameter','value'];
}