<?php

namespace Wiskunde\Http\Controllers;

use Illuminate\Http\Request;
use Wiskunde\Solution;

use Wiskunde\Chapter;

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
        $allChapters = Chapter::All();
        return view('home')
            ->with('allChapters',$allChapters);
    }
    public function question()
    {
    }
}
