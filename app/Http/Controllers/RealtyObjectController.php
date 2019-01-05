<?php

namespace App\Http\Controllers;

use App\RealtyObject;
use Illuminate\Http\Request;

class RealtyObjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $r = new RealtyObject;
        $r->name = $request->name;
        $r->address = $request->address;
        $r->cost = (double)$request->cost;
        $r->type_id = (int)$request->type_id;
        $r->area_total = (double)$request->area_total;
        $r->area_residential = (double)$request->area_residential;
        $r->area_kitchen = (double)$request->area_kitchen;
        $r->floors = (int)$request->floors;
        $r->floor = (int)$request->floor;
        $r->ru_description = $request->ru_descritpion;
        $r->en_description = $request->en_description;
        $r->phone = $request->phone;
        $r->email = $request->email;
        $r->save();
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
        $realtyObject->delete();
    }
}
