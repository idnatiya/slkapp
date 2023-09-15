<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
	/**
	 * Table Name
	 * 
	 * @var string
	 */
    protected $table = 'app_supplier';

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
	protected $fillable = ['nama', 'alamat', 'kontak', 'status', 'created_at', 'updated_at'];
}
