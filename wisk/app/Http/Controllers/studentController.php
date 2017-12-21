<?php

namespace Wiskunde\Http\Controllers;

use Illuminate\Http\Request;
use Wiskunde\Chapter;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


use Wiskunde\Solution;
use Wiskunde\Subchapter;

class studentController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }
    public function indexSolution()
    {
        $subChapter = Subchapter::all();
        $chapter = Chapter::all();

        return view("addSolution")
            ->with('subChapter', $subChapter)
            ->with('chapter', $chapter);
    }
    public function storeSolution(Request $request)
    {
        // validate
// read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'      => 'required',
            'chapter'     => 'required' ,
            'subchapter'     => 'required' ,
            'exercise'       => 'required',
            'image'      => 'required|image'

        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator);
        }

        else {
            $image = $request->file('image');
            $name = Input::get('title').'.'.$image->getClientOriginalExtension();
            $image->move(public_path('img/uploads'), $name);

            // store
            $solution = new Solution();
            $solution->title           = Input::get('title');
            $solution->chapter         = Input::get('chapter');
            $solution->subchapter_id   = Input::get('subchapter');
            $solution->exercise        = Input::get('exercise');
            $solution->view            = 0;
            $solution->picture         = $name;
            $solution->userName        = Auth::user()->name;
            $solution->email        = Auth::user()->email;
            $solution->save();
            Session::flash('message', 'Oplossing toegevoegd');
            return Redirect::back();
        }
    }
    public function show($id)
    {
        $chapter = Chapter::find($id);
        $subChapter = Subchapter::where('chapter_id' ,$chapter->id)->get();

        return View::make('viewSubChapter')
            ->with('subChapter', $subChapter);
    }
    public function viewSolution($id)
    {
        $subChapter = Subchapter::find($id);
        $solution = Solution::where('subchapter_id' ,$subChapter->id)->get();

        return View::make('viewSolution')
            ->with('subChapter', $subChapter)
            ->with('solution', $solution);
    }
}
