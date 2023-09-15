<?php 

namespace App\Models; 

use Illuminate\Database\Eloquent\Model; 

class Penjualan extends Model
{
	/**
	 * Table Name 
	 * 
	 * @var string
	 */
	protected $table = 'app_penjualan'; 

	/**
	 * Primary Key 
	 * 
	 * @var string
	 */
	protected $primaryKey = 'id'; 

	/**
	 * Items 
	 * 
	 * @return object 
	 */
	public function items()
	{
		return $this->hasMany(PenjualanItem::class, 'penjualan_id'); 
	}

	/**
	 * Fillable Mask Assignment 
	 * 
	 * @var array
	 */
	public $fillable = ['nomor_invoice', 'nama_pembeli', 'tanggal_penjualan', 'tunai'];

	public function vrekappenjualan()
    {
        return $this->hasOne(Vrekappenjualan::class, 'penjualan_id');
    }

    public function vrekaplaba()
    {
        return $this->hasOne(Vrekaplaba::class, 'penjualan_id');
    }
}