<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListRequestController extends Controller
{
    public function index(){
        $listrequest = Booking::get();
        $TotalBooking = Booking::select('Approved', 'Rejected');
        return view('pages.admin.listrequest.main', compact('listrequest', 'TotalBooking'));
    }

    public function approved(Booking $listrequest){
        $room = Room::find($listrequest->room_id);
        $room->status='Ordered';
        $room->update();
        $listrequest->status = 'Approved';
        $listrequest->update();
        // $history = New History;
        // $history-> name = auth()->user()->name;
        // $history-> room_id = $request->name;
        // $history-> date = $request->date;
        // $history-> start = $request->start;
        // $history-> end = $request->end;
        // $history-> status = $request->status;
        // $history-> description = $request->description;
        // $history->save();

        return redirect()->back()->with('status','Berhasil di approved');
    }

    public function rejected(Booking $listrequest){
        $listrequest->status = 'Rejected';
        $listrequest->update();
        return redirect()->back()->with('status','Berhasil di approved');
    }
    public function destroy($id)
    {
        $booking = Booking::find($id);
        $room = Room::find($booking->room_id);
        // dd($room);
        $room->status = 'Ready';
        $room->update();
        $booking->delete();
        return redirect()->back()->with('status','Request berhasil di hapus');
    }
}

