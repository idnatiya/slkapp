<?php 

namespace App\Models; 

use Illuminate\Database\Eloquent\Model; 

class VNotif extends Model
{
	/**
	 * Table Name
	 * 
	 * @var string
	 */
	protected $table = 'v_notif';

	/**
	 * Master Barang 
	 * 
	 * @return object 
	 */
	public function masterBarang()
	{
		return $this->belongsTo(MasterBarang::class, 'master_barang_id'); 
	} 
}