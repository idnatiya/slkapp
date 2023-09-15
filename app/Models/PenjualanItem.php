<?php 

namespace App\Models; 

use Illuminate\Database\Eloquent\Model; 

class PenjualanItem extends Model
{
	/**
	 * Table Name 
	 * 
	 * @var string
	 */
	protected $table = 'app_penjualan_item'; 

	/**
	 * Primary Key 
	 * 
	 * @var string
	 */
	protected $primaryKey = 'id'; 

	/**
	 * Pembelian 
	 * 
	 * @return void
	 */
	public function pembelian()
	{
		return $this->belongsTo(Pembelian::class, 'pembelian_id'); 
	}

	/**
	 * Get Nama Barang 
	 * 
	 * @return void
	 */
	public function getNamaBarangAttribute()
	{
		if ($this->pembelian) {
			if ($this->pembelian->masterBarang) {
				return $this->pembelian->masterBarang->nama; 
			}
		}
	}

	/**
	 * Modal 
	 * 
	 * @return string 
	 */
	public function getModalAttribute()
	{
		if ($this->pembelian) {
			return $this->pembelian->harga_beli; 
		}
	}

	/**
	 * Modal 
	 * 
	 * @return string 
	 */
	public function getTotalAttribute()
	{
		$total = ($this->harga_jual * $this->qty) - $this->diskon; 
		return $total; 
	}

	/**
	 * Fillable Mask Assignment 
	 * 
	 * @var array
	 */
	public $fillable = ['penjualan_id', 'pembelian_id', 'qty', 'harga_jual', 'diskon'];
}