<?php

namespace App\Http\Controllers\Web;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataRuanganController extends Controller
{
    public function index(){
        $TotalBooking = Booking::select('Approved', 'Rejected');
        $listrequest = Booking::get();
        // $listrequest->command('foo');
        // $listrequest->hourly();
        // $listrequest->timezone('Indonesia/Jakarta');
        return view('pages.web.dataruangan.main', compact('listrequest', 'TotalBooking'));
    }
}
