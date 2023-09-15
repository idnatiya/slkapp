<?php 

namespace App\Http\Controllers; 

use App\Models\MasterBarangKategori; 
use App\Http\Controllers\Controller; 
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request; 

class MasterBarangKategoriController extends Controller
{
	/**
	 * Index 
	 * 
	 * @return void
	 */
	public function index()
	{
		return view('master_barang_kategori.index'); 
	}

	/**
	 * Edit 
	 * 
	 * @return void
	 */
	public function edit($id, Request $request)
	{
		$row = MasterBarangKategori::findOrFail($id);
		return response()->json($row);  
	}

	/**
	 * Datatables 
	 * 
	 * @return json
	 */
	public function datatables()
	{
		$query = MasterBarangKategori::get(); 

		return Datatables::of($query)
			->addColumn('aksi', function($query) {
				$btn = '';
				$btn .= '<button class="btn btn-sm btn-success" onclick="editModal(\''.$query->id.'\')"><i class="fa fa-fw fa-edit"></i> Edit</button> '; 
				$btn .= '<button class="btn btn-sm btn-danger"  onclick="deleteConfirm(\''.$query->id.'\')"><i class="fa fa-fw fa-trash"></i> Hapus</button>'; 
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

		MasterBarangKategori::create($request->all());

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

		$row = MasterBarangKategori::findOrFail($id); 
		$row->nama = $request->nama; 
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
		MasterBarangKategori::where('id', $request->id)
			->delete(); 

		return response()->json([
			'status' => 'success'
		]);  
	}
}