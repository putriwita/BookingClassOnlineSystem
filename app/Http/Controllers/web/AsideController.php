<?php

namespace App\Http\Controllers\Web;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AsideController extends Controller
{
    public function index(){
        $Bookings = Booking::where('user_id', Auth::guard('web')->user()->id);
        return view('web.auth.aside', compact('Bookings'));
    }
}
