<?php

namespace Wiskunde\Http\Controllers;

use Illuminate\Support\Facades\View;

class WelcomeController extends Controller
{
    public function index(){

        return view('welcome');
    }


}
