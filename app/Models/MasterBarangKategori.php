<?php 

namespace App\Models; 

use Illuminate\Database\Eloquent\Model; 

class MasterBarangKategori extends Model
{
	/**
	 * Table Name 
	 * 
	 * @var string
	 */
	protected $table = 'app_master_barang_kategori'; 

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
	public $fillable = ['nama'];
}