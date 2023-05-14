<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Editor;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function indexAdmin()
    {
        $usersCount = User::count();
        $editorsCount = Editor::count();
        $adminsCount = Admin::count();



        return view('admins.dashboard')->with('usersCount', $usersCount)->with('editorsCount', $editorsCount)->with('adminsCount', $adminsCount);
    }
}
