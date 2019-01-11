<?php

namespace App\Http\Controllers;

use App\RealtyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RealtyImageController extends Controller
{
    public function destroy(RealtyImage $image)
    {
        if(Storage::disk('public')->exists($image->image))
        {
            Storage::disk('public')->delete($image->image);
        }
        $image->delete();
        return redirect()->back();
    }
}
