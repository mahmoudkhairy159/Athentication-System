<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Editor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate('5');
        return view('admins.user.showUsers')->with('users', $users);
    }





    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User Does not Exist');
        }
        return view('profile')->with('user', $user);
    }











    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'user Does not Exist');
        }


        $user->update([
            'name' => $request->name,
        ]);
        if ($request->hasFile('photo')) {
            Storage::disk('users')->delete($user->photo);
            sleep(1);
            Storage::disk('users')->deleteDirectory($user->name . '_' . $user->id);

            $user->update([
                'photo' => $request->photo->store($user->name . '_' . $user->id, 'users'),
            ]);
        }



        return redirect()->route('users.show', $id)->with('success', 'Profile is updated successfully');
    }
}
