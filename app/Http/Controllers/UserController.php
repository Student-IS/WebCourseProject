<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Right;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $deleted = $request->has('deleted')? $request->deleted : null;
        $users = User::orderBy('name')->paginate(10);
        return view('admin.users', ['users' => $users, 'deleted' => $deleted]);
    }

    public function show()
    {
        $user = User::findOrFail(1); // AUTH!!!
        return view('user.profile', ['user' => $user]);
    }

    public function edit(User $user)
    {
        return view('admin.profile', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
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
        $user = User::findOrFail(1); // AUTH!!!
        $user->name = $request->name;
        $user->updated_at = now();
        $user->save();

        return view('user.profile', ['user' => $user, 'updated' => true]);
    }

    public function destroy(User $user)
    {
        $id = $user->id;

        $user->rights()->detach();
        $user->delete();

        return redirect('/admin/users?deleted='.$id);
    }

    public function destroyAuth() // It may be UNREGISTER
    {
        $user = User::findOrFail(1); // AUTH!!!
        // LOGOUT first ???

        $user->rights()->detach();
        $user->delete();

        return redirect('/');
    }
}
