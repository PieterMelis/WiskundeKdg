<?php

namespace Wiskunde\Http\Controllers;

use Illuminate\Http\Request;
use Wiskunde\Solution;
use Illuminate\Support\Facades\View;
use Wiskunde\User;
use Wiskunde\Chapter;
use Wiskunde\Subchapter;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware( 'auth' );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $allSubchapters = Subchapter::all();
        $allChapters = Chapter::all();
        return View::make("home")
            ->with('allChapters', $allChapters)
            ->with('allSubchapters', $allSubchapters);
    }
    public function question()
    {
    }
}
