<?php

namespace App\Http\Controllers;

use App\Chart;
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

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $charts = Chart::orderBy('created_at','desc')->take(10)->get();


        return view('home',compact('charts'));
    }
}
