<?php 

namespace App\Http\Controllers; 

use App\Models\Pembelian; 
use App\Models\MasterBarang;  
use App\Models\Supplier;  
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request; 
use Yajra\Datatables\Datatables;

class PembelianController extends Controller
{

	public function index()
	{
		$master_barang = MasterBarang::all();
		$supplier = Supplier::all();
		// $master_barang = "YOW";
		return view('pembelian.index', compact('master_barang','supplier'));
	}

	public function datatables()
	{
		$query = Pembelian::get(); 

		return Datatables::of($query)
			->editColumn('supplier_id', function($query) {
				$quer_supp = Supplier::where("id","=",$query->supplier_id)->first();
				return $quer_supp->nama; 
			})
			->editColumn('master_barang_id', function($query) {
				$quer_supp = MasterBarang::where("id","=",$query->master_barang_id)->first();
				return $quer_supp->nama; 
			})
			->editColumn('harga_beli', function($query) {
				return display_currency($query->harga_beli); 
			})
			->addColumn('aksi', function($query) {
				$btn = '';
				
				$btn .= '<button class="btn btn-sm btn-danger"  onclick="deleteConfirm(\''.$query->id.'\')"><i class="fa fa-fw fa-trash"></i> Hapus</button>'; 
				return $btn; 
			})
			->rawColumns(['aksi'])
			->make(true); 
	}

	function store(Request $request)
	{
		// return $request;
		list($hari,$bulan,$tahun) = explode("-", $request->tgl_pembelian);
		$request->merge([
			'harga_beli' => str_replace('.', '', $request->harga_beli),
			'tgl_pembelian' => $tahun."-".$bulan."-".$hari
		]);
		Pembelian::create([
			"master_barang_id" => $request->master_barang_id,
			"supplier_id" => $request->supplier,
			"qty" => $request->qty,
			"harga_beli" => $request->harga_beli,
			"tanggal_pembelian" => $request->tgl_pembelian
		]);
		return response()->json([
			'status' => 'success'
		]);  
	}
	/**
	 * Search  
	 *
	 * @return html
	 */
	public function search(Request $request)
	{
		$pembelian_id = ($request->pembelian_id) ? explode(',', $request->pembelian_id) : []; 
		$params['row_id'] = $request->row_id; 
		$params['pembelian'] = Pembelian::where('master_barang_id', $request->master_barang_id)
			->whereNotIn('id', $pembelian_id)
			->whereHas('stokPenjualan', function($query) {
				$query->where('stok', '>', 0); 
			})
			->get(); 
		$html = view('pembelian.search', $params)->render(); 
		return $html; 
	} 

	/**
	 * Find 
	 * 
	 * @param  Request $request 
	 * @return json
	 */
	public function find(Request $request)
	{
		$row = Pembelian::findOrFail($request->id); 
		$output = [
			'id' => $row->id, 
			'master_barang_id' => $row->master_barang_id, 
			'nama' => $row->masterBarang->nama,
			'stok' => $row->stokPenjualan->stok, 
			'harga_jual' => $row->masterBarang->harga_jual
		]; 

		return response()->json($output); 
	}

	public function destroy(Request $request)
	{
		Pembelian::where('id', $request->id)
			->delete(); 

		return response()->json([
			'status' => 'success'
		]);  
	}
}