<?php 

namespace App\Http\Controllers; 

use App\Models\MasterBarang; 
use App\Models\MasterBarangKategori; 
use App\Http\Controllers\Controller; 
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request; 

class MasterBarangController extends Controller
{
	/**
	 * Index 
	 * 
	 * @return void
	 */
	public function index()
	{
		$params['master_barang_kategori'] = MasterBarangKategori::all();
		return view('master_barang.index', $params); 
	}

	/**
	 * Find 
	 * 
	 * @param  Request $request 
	 * @return json
	 */
	public function find(Request $request)
	{
		$row = MasterBarang::findOrFail($request->master_barang_id);
		return response()->json($row);  
	}

	/**
	 * Statistik 
	 * 
	 * @return void
	 */
	public function statistik()
	{	
		$categories = []; 
		$data = []; 
		foreach (MasterBarang::all() as $row) {
			$categories[] = $row->nama; 
			$data[] = ($row->laba) ? intval($row->laba->laba) : intval(0);  
		}

		return response()->json([
			'categories' => $categories, 
			'series' => [
				[
					'name' => 'Laba', 
					'data' => $data
				]
			]
		]); 
	}

	/**
	 * Edit 
	 * 
	 * @return void
	 */
	public function edit($id, Request $request)
	{
		$row = MasterBarang::findOrFail($id);
		return response()->json($row);  
	}

	/**
	 * Datatables 
	 * 
	 * @return json
	 */
	public function datatables()
	{
		$query = MasterBarang::get(); 

		return Datatables::of($query)
			->editColumn('harga_beli', function($query) {
				return display_currency($query->harga_beli); 
			})
			->editColumn('harga_jual', function($query) {
				return display_currency($query->harga_jual); 
			})
			->editColumn('harga_jual_grosir', function($query) {
				return display_currency($query->harga_jual_grosir); 
			})
			->editColumn('min_stok', function($query) {
				return $query->min_stok . ' ' . $query->satuan; 
			})
			->addColumn('stok', function($query) {
				if ($query->stok) {
					return $query->stok->stok . ' ' . $query->satuan; 
				}
			})
			->addColumn('terjual', function($query) {
				return $query->terjual . ' ' . $query->satuan;  
			})
			->addColumn('laba', function($query) {
				if ($query->laba) {
					return display_currency($query->laba->laba); 
				}
			})
			->addColumn('aksi', function($query) {
				$btn = '';
				$btn .= '<button class="btn btn-xs btn-success" onclick="editModal(\''.$query->id.'\')"><i class="fa fa-fw fa-edit"></i></button> '; 
				$btn .= '<button class="btn btn-xs btn-danger"  onclick="deleteConfirm(\''.$query->id.'\')"><i class="fa fa-fw fa-trash"></i></button>'; 
				return $btn; 
			})
			->rawColumns(['aksi'])
			->make(true); 
	}

	/**
	 * Store 
	 * 
	 * @param  Request $request 
	 * @return void
	 */
	public function store(Request $request)
	{
		$request->validate([
			'nama' => 'required'
		]); 

		$request->merge([
		    'harga_beli' => str_replace('.', '', $request->harga_beli),
		    'harga_jual' => str_replace('.', '', $request->harga_jual),
		    'harga_jual_grosir' => str_replace('.', '', $request->harga_jual_grosir),
		]);

		MasterBarang::create($request->all());

		return response()->json([
			'status' => 'success'
		]);  
	}

	/**
	 * Update 
	 * 
	 * @param  Request $request 
	 * @return void
	 */
	public function update($id, Request $request)
	{
		$request->validate([
			'nama' => 'required'
		]); 

		$row = MasterBarang::findOrFail($id); 
		$row->nama = $request->nama; 
		$row->master_barang_kategori_id = $request->master_barang_kategori_id; 
		$row->satuan = $request->satuan; 
		$row->harga_beli = str_replace('.', '', $request->harga_beli);
		$row->harga_jual = str_replace('.', '', $request->harga_jual);
		$row->harga_jual_grosir = str_replace('.', '', $request->harga_jual_grosir);
		$row->min_stok = $request->min_stok; 
		$row->save(); 

		return response()->json([
			'status' => 'success'
		]);  
	}

	/**
	 * Destroy 
	 * 
	 * @param  Request $request
	 * @return void
	 */
	public function destroy(Request $request)
	{
		MasterBarang::where('id', $request->id)
			->delete(); 

		return response()->json([
			'status' => 'success'
		]);  
	}
}