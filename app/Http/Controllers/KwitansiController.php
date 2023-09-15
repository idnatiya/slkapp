<?php
namespace App\Http\Controllers; 

use App\Models\AppKonfigurasi;  
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request; 

class KwitansiController extends Controller
{
	function index()
	{
		$ambil_gambar = AppKonfigurasi::where("parameter","=","logo_kwitansi")->first();
		$gambar = "";
		if (empty($ambil_gambar)) {
			$gambar = "masih kosong";
		}else{
			$gambar = $ambil_gambar->value;
		}

		$ambil_alamat = AppKonfigurasi::where("parameter","=","alamat_kwitansi")->first();
		$alamat = "";
		if (empty($ambil_alamat)) {
			$alamat = "";
		}else{
			$alamat = $this->br2nl($ambil_alamat->value);
		}

		return view('kwitansi.index', compact('gambar','alamat'));
	}

	function store(Request $request)
	{
		if (is_file($request->logo)) {
			$filename = time().'.'.request()->logo->getClientOriginalExtension();
			request()->logo->move(public_path('images'), $filename);
			$ambil_gambar = AppKonfigurasi::where("parameter","=","logo_kwitansi")->first();
			if (empty($ambil_gambar)) {
				AppKonfigurasi::insert([
					"value" => $filename,
					"parameter" => "logo_kwitansi"
				]);
			}else{
				AppKonfigurasi::where('parameter', 'logo_kwitansi')->update([
					"value" => $filename,
				]);
			}
		}
		
		$ambil_alamat = AppKonfigurasi::where("parameter","=","alamat_kwitansi")->first();
		if (empty($ambil_alamat)) {
			AppKonfigurasi::insert([
				"value" => nl2br($request->alamat),
				"parameter" => "alamat_kwitansi"
			]);
		}else{
			AppKonfigurasi::where('parameter', 'alamat_kwitansi')->update([
				"value" => nl2br($request->alamat),
			]);
		}
		
		return back();
	}

	function br2nl($input) {
	    return preg_replace('/<br\\s*?\/??>/i', '', $input);
	}

}