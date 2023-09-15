<?php 

namespace App\Http\Controllers; 

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request; 
use App\Models\Vrekaplaba; 
use App\Models\Vrekappenjualan; 
use App\Models\Pembelian; 
use App\Models\Bulan; 

use DateTime; 
use DateInterval; 
use DatePeriod; 

class DashboardController extends Controller
{
	/**
	 * Index 
	 * 
	 * @return void
	 */
	public function index()
	{
		$params['boxs'] = $this->boxStatistik();
		$params['bulan'] = Bulan::all();  
		return view('dashboard.index', $params); 
	}

	/**
	 * Hari Ini 
	 * 
	 * @return void
	 */
	protected function hariIni()
	{
		$total = Vrekaplaba::selectRaw('SUM(laba) as total')
			->where('tanggal_penjualan', date('Y-m-d'))
			->first(); 

		if ($total) {
			return $total->total; 
		}
	}

	/**
	 * Bulan Ini 
	 * 
	 * @return void
	 */
	protected function bulanIni()
	{
		$total = Vrekaplaba::selectRaw('SUM(laba) as total')
			->whereRaw('YEAR(tanggal_penjualan)=?', date('Y'))
			->whereRaw('MONTH(tanggal_penjualan)=?', date('m'))
			->first(); 

		if ($total) {
			return $total->total; 
		}
	}

	/**
	 * Tahun Ini 
	 * 
	 * @return void
	 */
	protected function tahunIni()
	{
		$total = Vrekaplaba::selectRaw('SUM(laba) as total')
			->whereRaw('YEAR(tanggal_penjualan)=?', date('Y'))
			->first(); 

		if ($total) {
			return $total->total; 
		}
	}

	/**
	 * Bulan Ini 
	 * 
	 * @return void
	 */
	protected function totalLaba()
	{
		$total = Vrekaplaba::selectRaw('SUM(laba) as total')
			->first(); 

		if ($total) {
			return $total->total; 
		}
	}

	/**
	 * Box Statistik 
	 * 
	 * @return void
	 */
	public function boxStatistik()
	{
		return [
			[
				'title' => 'Hari ini', 
				'total' => $this->hariIni(),
				'class' => 'info'
			],
			[
				'title' => 'Bulan ini', 
				'total' => $this->bulanIni(),
				'class' => 'success'
			],
			[
				'title' => 'Tahun ini', 
				'total' => $this->tahunIni(),
				'class' => 'warning'
			],
			[
				'title' => 'Total Laba', 
				'total' => $this->totalLaba(),
				'class' => 'danger'
			],
		]; 
	}

	/**
	 * Day 
	 * 
	 * @return json
	 */
	public function day(Request $request)
	{
		$start = $request->start; 
		$end = $request->end; 

		$begin = new DateTime($start);
		$end = new DateTime($end);

		$interval = DateInterval::createFromDateString('1 day');
		$period = new DatePeriod($begin, $interval, $end);

		$categories = []; 
		$modal = []; 
		$penjualan = []; 
		$laba = []; 
		foreach ($period as $dt) {
		    $categories[] = $dt->format('d/m/Y');
		    $modal[] = intval(Pembelian::selectRaw('SUM(harga_beli * qty) as total')
							->where('tanggal_pembelian', $dt->format('Y-m-d'))
							->first()->total); 
		    $penjualan[] = intval(Vrekappenjualan::selectRaw('SUM(harga_total_jual) as total')
							->where('tanggal_penjualan', $dt->format('Y-m-d'))
							->first()->total); 
		    $laba[] = intval(Vrekaplaba::selectRaw('SUM(laba) as total')
						->where('tanggal_penjualan', $dt->format('Y-m-d'))
						->first()->total);
		}

		return response()->json([
			'categories' => $categories,
			'series' => [
				[
					'name' => 'Modal', 
					'data' => $modal
				], [
					'name' => 'Penjualan', 
					'data' => $penjualan
				], [
					'name' => 'Laba', 
					'data' => $laba
				],
			]
		]); 
	}

	/**
	 * Month
	 * 
	 * @return json
	 */
	public function month(Request $request)
	{
		$year = $request->year; 
		$categories = []; 
		$modal = []; 
		$penjualan = []; 
		$laba = []; 
		foreach (Bulan::all() as $row) {
			$categories[] = $row->nama;
		    $modal[] = intval(Pembelian::selectRaw('SUM(harga_beli * qty) as total')
							->whereRaw('MONTH(tanggal_pembelian)=?', $row->index)
							->whereRaw('YEAR(tanggal_pembelian)=?', $year)
							->first()->total); 
		    $penjualan[] = intval(Vrekappenjualan::selectRaw('SUM(harga_total_jual) as total')
							->whereRaw('MONTH(tanggal_penjualan)=?', $row->index)
							->whereRaw('YEAR(tanggal_penjualan)=?', $year)
							->first()->total); 
		    $laba[] = intval(Vrekaplaba::selectRaw('SUM(laba) as total')
							->whereRaw('MONTH(tanggal_penjualan)=?', $row->index)
							->whereRaw('YEAR(tanggal_penjualan)=?', $year)
							->first()->total);
		}

		return response()->json([
			'categories' => $categories,
			'series' => [
				[
					'name' => 'Modal', 
					'data' => $modal
				], [
					'name' => 'Penjualan', 
					'data' => $penjualan
				], [
					'name' => 'Laba', 
					'data' => $laba
				],
			]
		]); 
	}
}