<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RealtyType;
use App\RealtyObject;
use App\RealtyImage;

class RealtyTypeController extends Controller
{
    public function showAdmin(string $type)
    {
        $rType = RealtyType::where('type_name', $type)->firstOrFail();
        $realty = $rType->realtyObjects()->latest()->orderBy('id','desc')->paginate(10);
        return view('admin.realty', ['realty' => $realty, 'type' => $type]);
    }

    public function show(string $type)
    {
        $rType = RealtyType::where('type_name', $type)->firstOrFail();
        $realty = $rType->realtyObjects()->latest()->orderBy('id','desc')->paginate(10);
        return view('user.realty', ['realty' => $realty, 'type' => $type]);
    }
}
