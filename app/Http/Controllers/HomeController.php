<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CAtegory;

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
        $category = Category::all()->count();
        return view('category.index',compact('category'));
        /*return view ('home');*/
    }
   /* public function showtable()
    {
       $user = User::all();
        return view('client.table', compact('user'));
    }*/
}
