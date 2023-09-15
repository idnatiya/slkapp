<?php

namespace App\Http\Controllers;

use App\Models\Konfigurasi; 
use App\Models\VNotif; 

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Construct 
     *
     * @return void
     */
    public function __construct(
        Konfigurasi $konfigurasi,
        VNotif $notif
    )
    {
    	view()->share('konfigurasi', $konfigurasi); 
        view()->share('notif', $notif); 
    }
}
