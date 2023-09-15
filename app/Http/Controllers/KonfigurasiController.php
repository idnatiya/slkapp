<?php 

namespace App\Http\Controllers; 

use App\Models\Konfigurasi; 
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request; 

class KonfigurasiController extends Controller
{	
	/**
	 * Form 
	 * 
	 * @return void
	 */
	public function form()
	{
		return view('konfigurasi.form'); 
	}

	/**
	 * Update 
	 * 
	 * @return void
	 */
	public function update(Request $request)
	{
		$parameters = $request->input; 
		foreach ($parameters as $index => $value) {
			Konfigurasi::where('parameter', $index)
				->update([
					'value' => $value
				]); 
		}

		return redirect('/konfigurasi?status=success'); 
	}
}