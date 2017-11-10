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

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexSolution()
    {
        return view("addSolution");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSolution(Request $request)
    {
        // validate
// read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'      => 'required',
            'chapter'     => 'required' ,
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
            $solution->exercise        = Input::get('exercise');
            $solution->view            = 1;
            $solution->picture         = $name;
            $solution->userName        = Auth::user()->name;

            $solution->save();
            // redirect
            Session::flash('message', 'Oplossing toegevoegd');
            return Redirect::back();

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chapter = Chapter::find($id);
        $solution = Solution::where('chapter' ,$chapter->nr)->get();

        return View::make('viewSolution')
            ->with('chapter', $chapter)
            ->with('solution', $solution);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
