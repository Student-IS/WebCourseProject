<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RealtyObject;
use App\RealtyType;
use App\RealtyImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
            $realty = $rType->realtyObjects()->whereNull('sold_at')->latest()->orderBy('id','desc')->paginate(3);
            $realty->appends(['class' => $request->class]);
        }
        else
        {
            $realty = RealtyObject::whereNull('sold_at')->latest()->orderBy('id','desc')->paginate(3);
        }
        return view('user.realty', ['realty' => $realty, 'type' => $request->class]);
    }

    public function indexAdmin(Request $request)
    {
        $created = $request->has('created')? $request->created : null;
        $deleted = $request->has('deleted')? $request->deleted : null;
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
        return view('admin.realty', ['realty' => $realty, 'type' => $request->class, 'created' => $created, 'deleted' => $deleted]);
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
        $this->validate(
            $request,
            [
                'name' => 'required|max:255',
                'address' => 'required|max:255',
                'cost' => 'required|numeric',
                'type' => 'required',
                'areaTotal' => 'required|numeric',
                'areaResidential' => 'nullable|numeric|lte:areaTotal',
                'areaKitchen' => 'nullable|numeric|lte:areaTotal',
                'floors' => 'required|integer',
                'floor' => 'nullable|integer|lte:floors',
                'text' => 'required',
                'enText' => 'nullable',
                'phone' => 'required|digits_between:8,11',
                'email' => 'nullable|email',
                'images' => 'nullable',
                'image.*' => 'image|mimes:jpg,jpeg,png,gif,svg|max:4096'
            ]
        );

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

        return redirect('/admin/realty?created='.$r->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RealtyObject  $object
     * @return \Illuminate\Http\Response
     */
    public function show(RealtyObject $object, Request $request)
    {
        $booked = $request->has('booked')? true : null;
        $src = $request->has('src')? $request->src : null;

        return view('user.realtyObject', ['r' => $object, 'booked' => $booked, 'src' => $src]);
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

    public function showBookings(Request $request)
    {
        $sold = $request->has('sold') ? $request->sold : null;
        if ($request->has('class'))
        {
            $rType = RealtyType::where('type_name', $request->class)->firstOrFail();
            $realty = $rType->realtyObjects()->whereNotNull('booked_by')->paginate(10);
            $realty->appends(['class' => $request->class]);
        }
        else
        {
            $realty = RealtyObject::whereNotNull('booked_by')->paginate(10);
        }

        return view('admin.booking', ['realty' => $realty, 'sold' => $sold, 'type' => $request->class]);
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
        $this->validate(
            $request,
            [
                'name' => 'required|max:255',
                'address' => 'required|max:255',
                'cost' => 'required|numeric',
                'type' => 'required',
                'areaTotal' => 'required|numeric',
                'areaResidential' => 'nullable|numeric|lte:areaTotal',
                'areaKitchen' => 'nullable|numeric|lte:areaTotal',
                'floors' => 'required|integer',
                'floor' => 'nullable|integer|lte:floors',
                'text' => 'required',
                'enText' => 'nullable',
                'phone' => 'required|digits_between:8,11',
                'email' => 'nullable|email',
                'images' => 'nullable',
                'image.*' => 'image|mimes:jpg,jpeg,png,gif,svg|max:4096'
            ]
        );

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

    public function book(RealtyObject $object)
    {
        if (!$object->booked_by && !$object->sold_at)
        {
            $object->booked_by = Auth::id();
        }
        $object->save();

        return redirect()->route('realty.show', ['object' => $object, 'booked' => true]);
    }

    public function cancelBooking(RealtyObject $object)
    {
        if ($object->booked_by && !$object->sold_at)
        {
            if ($object->user->id === Auth::id() ||
                Auth::user()->rights()->where('name','view_bookings')->exists())
            $object->booked_by = null;
        }
        $object->save();

        return redirect()->back();
    }

    public function sell(RealtyObject $object)
    {
        if (!$object->sold_at)
        {
            $object->sold_at = now();
        }
        $object->save();

        return redirect()->route('admin.booking', ['sold' => $object->id]);
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

        return redirect('/admin/realty?deleted='.$id);
    }
}
