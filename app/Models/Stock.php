<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    // use HasFactory;
    protected $table = 'stock';
	protected $primaryKey = 'id';
	protected $fillable = ['nama', 'harga_beli', 'harga_jual', 'harga_jual_grosir', 'supplier', 'qty', 'jenis', 'satuan', 'status', 'ket', 'created_by', 'created_at', 'updated_by', 'updated_at'];
}
