<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RealtyObject;
use App\RealtyType;
use App\RealtyImage;
use Illuminate\Support\Facades\Storage;

class RealtyObjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $realty = RealtyObject::latest()->orderBy('id','desc')->get();
//        return view('user.realty',['objects' => $realty]);
    }

    public function indexOfType(string $type)
    {
//        $data = RealtyObject::where('type_id','1')->latest()->orderBy('id','desc')->get();
//        return view('user.realty',['objects' => $data, 'type' => $type]);
    }

    public function indexAdmin()
    {
        $realty = RealtyObject::latest()->orderBy('id','desc')->paginate(10);
        return view('admin.realty', ['realty' => $realty]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.realtyCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $r = new RealtyObject();
        $r->name = $request->name;
        $r->address = $request->address;
        $r->cost = (double)$request->cost;
        $r->type_id = RealtyType::where('type_name', $request->type)->firstOrFail()->id;
        $r->area_total = (double)$request->areaTotal;
        $r->area_residential = (double)$request->areaResidential;
        $r->area_kitchen = (double)$request->areaKitchen;
        $r->floors = (int)$request->floors;
        $r->floor = (int)$request->floor;
        $r->ru_description = $request->text;
        $r->en_description = $request->enText;
        $r->phone = $request->phone;
        $r->email = $request->email;

        $r->save();

        if($request->hasFile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $rImage = new RealtyImage();
                $rImage->object_id = $r->id;
                $path = Storage::disk('public')->put("img/realty/{$r->id}", $image);
                $rImage->image = $path;
                $rImage->save();
            }
        }
        $realty = RealtyObject::latest()->orderBy('id','desc')->paginate(10);
        return view('admin.realty', ['realty' => $realty, 'created' => [$r->id, $r->name, $r->created_at]]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RealtyObject  $realtyObject
     * @return \Illuminate\Http\Response
     */
    public function show(RealtyObject $realtyObject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RealtyObject  $realtyObject
     * @return \Illuminate\Http\Response
     */
    public function edit(RealtyObject $realtyObject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RealtyObject  $realtyObject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RealtyObject $realtyObject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RealtyObject  $realtyObject
     * @return \Illuminate\Http\Response
     */
    public function destroy(RealtyObject $realtyObject)
    {
        //
    }
}
