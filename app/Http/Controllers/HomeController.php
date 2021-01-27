<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Form;
use App\Formtwo;
use App\User;

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
        $user = Auth::user();
        $forms = Form::where('user_id', $user -> id)-> get();
        $formtwos = Formtwo::where('user_id', $user -> id)-> get();
        return view('home', compact('forms','formtwos'));
    }
}
