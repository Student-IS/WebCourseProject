<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\RealtyObject;
use App\User;

class BookingController extends Controller
{
    public function index()
    {
        //
    }

    public function indexAdmin()
    {
        $orders = Booking::latest()->orderBy('id', 'desc')->paginate(10);
        return view('admin.booking', ['orders' => $orders]);
    }

    public function store(User $user, RealtyObject $object)
    {
        //
        return redirect()->back()->withInput(['created' => true]);
    }

}
