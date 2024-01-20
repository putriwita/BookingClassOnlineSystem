<?php

namespace App\Http\Controllers\Web;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateBookingRequest;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $TotalBooking = Booking::select('Approved', 'Rejected');
        $AllBooking = Booking::where('user_id', Auth::guard('web')->user()->id)->withTrashed()->get();
        $room = Room::all();
        return view('pages.web.booking.main', compact('AllBooking', 'room', 'TotalBooking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   
        $room = Room::find($id);
        $rooms = Room::where('status', '=', 'ready')->get();
        return view('pages.web.booking.request', ['data' => new Booking, 'room' => $room, 'rooms' => $rooms]);
    }

    public function request()
    {   
        $rooms = Room::where('status', '=', 'ready')->get();
        return view('pages.web.booking.request', ['data' => new Booking, 'rooms' => $rooms]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'room_id' => 'required',
            'date' => 'required',
            'start' => 'required',
            'end' => 'required',
            'description' => 'required'
        ]);
        
        $booking = new Booking;
        $booking-> user_id = auth()->user()->id;
        $booking-> room_id = $request->room_id;
        $booking-> date = $request->date;
        $booking-> start = $request->start;
        $booking-> end = $request->end;
        $booking-> description = $request->description;
        $booking->save();
        // dd($booking);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        $room = Room::find($booking->room_id);
        $rooms = Room::where('status', '=', 'ready')->get();
        return view('pages.web.booking.book', ['data'=>$booking, 'room' => $room, 'rooms' => $rooms]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookingRequest  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $booking)
    {
        $request->validate([
            'date'=>'required',
            'start'=>'required',
            'end'=>'required',
            'room_id'=>'required',
            'description'=>'required'
        ]);
        Booking::where('id',$booking)
        ->update([
            'date'=>$request->date,
            'start'=>$request->start,
            'end'=>$request->end,
            'room_id'=>$request->room_id,
            'description'=>$request->description,
        ]);

        return redirect("booking")->with('status','Request berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $room = Room::all();
        $books = Booking::find($id);
        $room = Room::where('status', '=', 'Ordered')
        ->orWhere('status', '=', 'Rejected')
        ->first();
        // dd($room);
        // $books = Booking::where('id',$booking);
        // dd($books);
        $room->status='Ready';
        $room->update();
        
        $books->delete();
        return redirect("booking")->with('status','Request berhasil di hapus');
    }
}
