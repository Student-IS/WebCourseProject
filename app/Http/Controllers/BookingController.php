<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\RealtyObject;
use App\User;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    }

    public function indexAdmin()
    {
        $orders = Booking::latest()->orderBy('id', 'desc')->paginate(10);
        return view('admin.booking', ['orders' => $orders]);
    }

    public function store(RealtyObject $object)
    {
        $booking = new Booking();
        $booking->user()->associate(Auth::user());
        $booking->realtyObject()->associate($object);
        $booking->save();

        return redirect()->route(
            'realty.show',
            ['object' => $object->id, 'booked' => true]);
    }

}
