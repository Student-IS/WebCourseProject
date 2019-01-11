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
    public function index(Request $request)
    {
        if ($request->has('class'))
        {
            $rType = RealtyType::where('type_name', $request->class)->firstOrFail();
            $realty = $rType->realtyObjects()->latest()->orderBy('id','desc')->paginate(3);
            $realty->appends(['class' => $request->class]);
        }
        else
        {
            $realty = RealtyObject::latest()->orderBy('id','desc')->paginate(3);
        }
        return view('user.realty', ['realty' => $realty, 'type' => $request->class]);
    }

    public function indexAdmin(Request $request)
    {
        if ($request->has('class'))
        {
            $rType = RealtyType::where('type_name', $request->class)->firstOrFail();
            $realty = $rType->realtyObjects()->latest()->orderBy('id','desc')->paginate(10);
            $realty->appends(['class' => $request->class]);
        }
        else
        {
            $realty = RealtyObject::latest()->orderBy('id','desc')->paginate(10);
        }
        return view('admin.realty', ['realty' => $realty, 'type' => $request->class]);
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
     * @param  \App\RealtyObject  $object
     * @return \Illuminate\Http\Response
     */
    public function show(RealtyObject $object)
    {
        return view('user.realtyObject', ['r' => $object]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RealtyObject  $realtyObject
     * @return \Illuminate\Http\Response
     */
    public function edit(RealtyObject $object)
    {
        return view('admin.realtyObject', ['r' => $object]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RealtyObject  $realtyObject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RealtyObject $object)
    {
        $object->name = $request->name;
        $object->address = $request->address;
        $object->cost = (double)$request->cost;
        $object->type_id = RealtyType::where('type_name', $request->type)->firstOrFail()->id;
        $object->area_total = (double)$request->areaTotal;
        $object->area_residential = (double)$request->areaResidential;
        $object->area_kitchen = (double)$request->areaKitchen;
        $object->floors = (int)$request->floors;
        $object->floor = (int)$request->floor;
        $object->ru_description = $request->text;
        $object->en_description = $request->enText;
        $object->phone = $request->phone;
        $object->email = $request->email;

        $object->updated_at = now();
        $object->save();

        if($request->hasFile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $rImage = new RealtyImage();
                $rImage->object_id = $object->id;
                $path = Storage::disk('public')->put("img/realty/{$object->id}", $image);
                $rImage->image = $path;
                $rImage->save();
            }
        }

        return view('admin.realtyObject', ['r' => $object, 'updated' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RealtyObject  $realtyObject
     * @return \Illuminate\Http\Response
     */
    public function destroy(RealtyObject $object)
    {
        $id = $object->id;
        $name = $object->name;
        $datetime = $object->created_at;

        if($object->realtyImages()->exists())
        {
            foreach($object->realtyImages as $image)
            {
                if(Storage::disk('public')->exists($image->image))
                {
                    Storage::disk('public')->delete($image->image);
                }
                $image->delete();
            }
            Storage::disk('public')->deleteDirectory('img/realty/'.$object->id);
        }

        $object->delete();

        $realty = RealtyObject::latest()->orderBy('id','desc')->paginate(10);
        return view('admin.realty', ['realty' => $realty, 'deleted' => [$id, $name, $datetime]]);
    }
}
