<?php

namespace App\Http\Controllers\Web;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $rooms = Room::all();
        return view('pages.web.dashboard.main', compact('rooms'));
    }
}
