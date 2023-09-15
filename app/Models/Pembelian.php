<?php 

namespace App\Models; 

use Illuminate\Database\Eloquent\Model; 

class Pembelian extends Model
{
	/**
	 * Table Name 
	 * 
	 * @var string
	 */
	protected $table = 'app_pembelian'; 

	/**
	 * Primary Key 
	 * 
	 * @var string
	 */
	protected $primaryKey = 'id'; 

	/**
	 * Master Barang 
	 * 
	 * @return object 
	 */
	public function masterBarang()
	{
		return $this->belongsTo(masterBarang::class, 'master_barang_id'); 
	}

	/**
	 * Stok Penjualan 
	 * 
	 * @return object 
	 */
	public function stokPenjualan()
	{
		return $this->hasOne(VStokPenjualan::class, 'pembelian_id'); 
	}

	/**
	 * Fillable Mask Assignment 
	 * 
	 * @var array
	 */
	public $fillable = ['master_barang_id', 'supplier_id', 'qty', 'harga_beli', 'tanggal_pembelian'];
}