<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Right;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if(!Auth::user()->rights()->where('name','add_admins')->exists())
        {
            return redirect()->route('admin');
        }

        $deleted = $request->has('deleted')? $request->deleted : null;
        $users = User::orderBy('name')->paginate(10);
        return view('admin.users', ['users' => $users, 'deleted' => $deleted]);
    }

    public function show()
    {
        $user = Auth::user();
        return view('user.profile', ['user' => $user]);
    }

    public function edit(User $user)
    {
        if(!Auth::user()->rights()->where('name','add_admins')->exists())
        {
            return redirect()->back();
        }
        return view('admin.profile', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        if(!Auth::user()->rights()->where('name','add_admins')->exists())
        {
            return redirect()->back();
        }

        $vbRight = Right::where('name','view_bookings')->first();
        $ecRight = Right::where('name','edit_content')->first();
        $aaRight = Right::where('name','add_admins')->first();
        $rights = $user->rights;
        if ($request->has('chkBook') !== $rights->contains($vbRight))
        {
            $user->rights()->toggle($vbRight->id);
        }
        if ($request->has('chkEdit') !== $rights->contains($ecRight))
        {
            $user->rights()->toggle($ecRight->id);
        }
        if ($request->has('chkAdmin') !== $rights->contains($aaRight))
        {
            $user->rights()->toggle($aaRight->id);
        }
        $user->name = $request->name;
        $user->updated_at = now();
        $user->save();
        return view('admin.profile', ['user' => $user, 'updated' => true]);
    }

    public function updateAuth(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->updated_at = now();
        $user->save();

        return view('user.profile', ['user' => $user, 'updated' => true]);
    }

    public function destroy(User $user)
    {
        if(!Auth::user()->rights()->where('name','add_admins')->exists())
        {
            return redirect()->back();
        }

        $id = $user->id;

        $user->rights()->detach();
        $user->delete();

        return redirect('/admin/users?deleted='.$id);
    }

    public function destroyAuth()
    {
        $user = Auth::user();

        $user->rights()->detach();
        $user->delete();

        return redirect('/');
    }
}
