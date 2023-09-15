<?php 

namespace App\Http\Controllers; 

use App\Models\Supplier; 
use App\Http\Controllers\Controller; 
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request; 

class SupplierController extends Controller
{
	/**
	 * Index 
	 * 
	 * @return void
	 */
	public function index()
	{
		return view('supplier.index'); 
	}

	/**
	 * Edit 
	 * 
	 * @return void
	 */
	public function edit($id, Request $request)
	{
		$row = Supplier::findOrFail($id);
		return response()->json($row);  
	}

	/**
	 * Datatables 
	 * 
	 * @return json
	 */
	public function datatables()
	{
		$query = Supplier::get(); 

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

		Supplier::create($request->all());

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

		$row = Supplier::findOrFail($id); 
		$row->nama = $request->nama; 
		$row->kontak = $request->kontak; 
		$row->alamat = $request->alamat; 
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
		Supplier::where('id', $request->id)
			->delete(); 

		return response()->json([
			'status' => 'success'
		]);  
	}
}