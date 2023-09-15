<?php 

namespace App\Models; 

use Illuminate\Database\Eloquent\Model; 

class MasterBarang extends Model
{
	/**
	 * Table Name 
	 * 
	 * @var string
	 */
	protected $table = 'app_master_barang'; 

	/**
	 * Primary Key 
	 * 
	 * @var string
	 */
	protected $primaryKey = 'id'; 

	/**
	 * Stok 
	 * 
	 * @return void
	 */
	public function stok()
	{
		return $this->hasOne(VStokBarang::class, 'master_barang_id'); 
	}

	/**
	 * Laba
	 * 
	 * @return void
	 */
	public function laba()
	{
		return $this->hasOne(VRekapLabaBarang::class, 'master_barang_id'); 
	}

	/**
	 * Terjual 
	 * 
	 * @return integer
	 */
	public function getTerjualAttribute()
	{
		$data = VBarangTerjual::selectRaw('SUM(terjual) as total')->where('master_barang_id', $this->id); 
		if ($data->count()) {
			return $data->first()->total; 
		}

		return 0; 
	}

	/**
	 * Fillable Mask Assignment 
	 * 
	 * @var array
	 */
	public $fillable = ['master_barang_kategori_id', 'nama', 'satuan', 'harga_beli', 'harga_jual', 'harga_jual_grosir', 'min_stok'];
}