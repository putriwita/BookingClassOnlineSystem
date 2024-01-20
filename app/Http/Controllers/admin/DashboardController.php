<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    public function index(Request $request){
        $TotalUser = User::where('role','!=', 'admin')->count();
        $TotalBooking = Booking::select('Approved', 'Rejected');
        $listrequest = Booking::withTrashed()->get();

        if ($request->ajax()){
            $listrequest = Booking::join('rooms', 'rooms.id', '=', 'bookings.room_id')
            ->join('users', 'users.id', '=', 'bookings.user_id')
            ->select('bookings.*', 'rooms.name as room_name', 'users.name as user_name', 'users.name as user_name', 'users.prodi as user_prodi', 'users.nim as user_nim')
            ->get();
            return DataTables::of($listrequest)
            ->make(true);
        }
        

        $AllBooking = Booking::count();
        $rooms = Room::all();

        

        return view('pages.admin.dashboard.main', ['TotalUser'=>$TotalUser, 'AllBooking'=>$AllBooking, 'TotalBooking'=>$TotalBooking, 'rooms' => $rooms, 'listrequest'=> $listrequest]);
    }
}
