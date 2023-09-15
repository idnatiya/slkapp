<?php

namespace App\Http\Controllers;

// use App\Models\Vrekappenjualan; 
use App\Models\Penjualan; 
use App\Models\Vrekaplaba; 
// use App\Models\MasterBarangKategori; 
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request; 

class LaporanController extends Controller
{
    //
    public function index()
    {
    	# code...
    	/*$model = Vrekappenjualan::all();
    	return $model;*/
    	return view("laporan.index");
    }

    public function penjualan(Request $request)
    {
    	# code...
    	// return $request;
    	$data['data_penjualan'] = Penjualan::with('vrekappenjualan')->get();
    	$data['tgl1'] = $request->tglpenjualn_start;
    	$data['tgl2'] = $request->tglpenjualn_end;
    	$data['jumlah'] = Penjualan::count();
    	return view('laporan.penjualan', $data);
    	// return Vrekappenjualan::all();
    }

    public function laba(Request $request)
    {
    	# code...
    	$data['data_laba'] = Penjualan::with('vrekaplaba')->get();
    	$data['tgl1'] = $request->tglpenjualn_start;
    	$data['tgl2'] = $request->tglpenjualn_end;
    	$data['jumlah'] = Penjualan::count();
    	return view('laporan.laba', $data);
    }
}
