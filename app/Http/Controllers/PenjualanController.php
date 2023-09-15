<?php 

namespace App\Http\Controllers; 

use App\Models\MasterBarang; 
use App\Models\Penjualan; 
use App\Models\PenjualanItem; 
use App\Http\Controllers\Controller; 
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request; 

use PDF;

class PenjualanController extends Controller
{
	/**
	 * Index 
	 * 
	 * @return void
	 */
	public function index()
	{
		return view('penjualan.index'); 
	}

	/**
	 * Create 
	 * 
	 * @return void
	 */
	public function create()
	{
		$params['master_barang'] = MasterBarang::all(); 
		return view('penjualan.create', $params); 
	}

	/**
	 * Get Nomor 
	 * 
	 * @return string 
	 */
	public function getNomor(Request $request)
	{
		$lastData = Penjualan::where('tanggal_penjualan', $request->date)
			->orderBy('nomor_invoice', 'desc'); 

		if ($lastData->count()) {
			$return = $lastData->first()->nomor_invoice + 1;
			return $return; 
		} else {
			$return = date('ymd', strtotime($request->date)) . '001'; 
			return $return; 
		}
	}

	/**
	 * Store 
	 * 
	 * @return void
	 */
	public function store(Request $request)
	{
		$this->__validate($request); 

		$request->merge([
		    'tunai' => str_replace('.', '', $request->tunai),
		]); 

		$penjualan = Penjualan::create($request->all()); 

		$pembelian_id = $request->pembelian_id; 
		$qty = $request->qty; 
		$harga_jual = $request->harga_jual; 
		$diskon = $request->diskon; 

		foreach ($qty as $index => $value) {
			PenjualanItem::create([
				'penjualan_id' => $penjualan->id, 
				'pembelian_id' => $pembelian_id[$index], 
				'qty' => $qty[$index], 
				'harga_jual' => str_replace('.', '', $harga_jual[$index]), 
				'diskon' => str_replace('.', '', $diskon[$index])
			]); 
		}

		return response()->json([
			'status' => 'success',
			'kwitansi' => route('penjualan.kwitansi', ['id' => $penjualan->id])
		]); 
	}

	/**
	 * Validate 
	 * 
	 * @return void
	 */
	protected function __validate($request)
	{
		$request->validate([
			'nomor_invoice' => 'required', 
			'tanggal_penjualan' => 'required', 
			'nama_pembeli' => 'required'
		]); 
	}

	/**
	 * Print Kwitansi 
	 * 
	 * @return void
	 */
	public function kwitansi($id)
	{
		$penjualan = Penjualan::findOrFail($id); 
		return PDF::loadView('penjualan.pdf_kwitansi', ['penjualan' => $penjualan])->stream();
	}

	public function datatables()
	{
		$query = Penjualan::with('Vrekappenjualan')->get(); 

		return Datatables::of($query)
			
			->addColumn('aksi', function($query) {
				$link = route('penjualan.kwitansi', ['id' => $query->id]);
				$btn = '';
				$btn .= '<a href="'.$link.'" class="btn btn-sm btn-info" target="_blank"><i class="fa fa-fw fa-eye"></i> Lihat Kwitansi</a>'; 
				$btn .= '<button class="btn btn-sm btn-danger"  onclick="deleteConfirm(\''.$query->id.'\')"><i class="fa fa-fw fa-trash"></i> Hapus</button>'; 
				return $btn; 
			})
			->rawColumns(['aksi'])
			->make(true); 
	}

	public function destroy(Request $request)
	{
		Penjualan::where('id', $request->id)
			->delete(); 
		PenjualanItem::where('penjualan_id', $request->id)
			->delete(); 

		return response()->json([
			'status' => 'success'
		]);  
	}
}