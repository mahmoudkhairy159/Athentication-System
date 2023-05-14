<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Editor;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::paginate('5');
        return view('admins.showAdmins')->with('admins', $admins);
    }
    public function changeUsersRole($id, Request $request)
    {
        $user = User::find($request->id);
        if ($request->newRole == 'admin') {
            Admin::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => $user->password
            ]);
            $user->delete();
        } elseif ($request->newRole == 'editor') {
            Editor::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => $user->password
            ]);
            $user->delete();
        }
        return redirect('admin/dashboard');
    }

    public function changeEditorsRole($id, Request $request)
    {
        $editor = Editor::find($id);
        if ($request->newRole == 'admin') {
            Admin::create([
                'name' => $editor->name,
                'email' => $editor->email,
                'password' => $editor->password
            ]);
            $editor->delete();
        } elseif ($request->newRole == 'user') {
            User::create([
                'name' => $editor->name,
                'email' => $editor->email,
                'password' => $editor->password
            ]);
            $editor->delete();
        }
        return redirect('admin/dashboard');
    }
}
