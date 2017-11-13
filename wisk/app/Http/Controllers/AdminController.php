<?php

namespace Wiskunde\Http\Controllers;

use Illuminate\Http\Request;
use Wiskunde\Chapter;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\IsAdmin;

use Illuminate\Support\Facades\View;
use Wiskunde\Solution;
use Wiskunde\User;
use Wiskunde\Subchapter;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allSubchapter = Subchapter::all();
        $allChapters = Chapter::all();
        return View::make("viewChapters")
            ->with('allChapters', $allChapters)
            ->with('allSubchapter', $allSubchapter);
    }

    public function indexChapter()
    {
        return view("addChapter");
    }

    public function adminSolution()
    {
        $solution = Solution::all();

        return View::make('adminSolution')
            ->with('solution', $solution);
    }
    public function good($id)
    {
        $solution = Solution::find($id);
        $solution->view            = 1;
        $solution->save();

        Session::flash('message', ' Deze oplossing is juist');
        return Redirect::back();
    }
    public function bad($id)
    {
        $sol = Solution::findOrFail($id);
        $sol->delete($id);
        return Redirect::back();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = array(
            'nr'       => 'required|max:100|Integer',
            'chapter'       => 'required|max:50'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $chapter = new Chapter();
            $chapter->nr       = Input::get('nr');
            $chapter->chapter      = Input::get('chapter');

            $chapter->save();
        }
        Session::flash('message', 'Hoofdstuk toegevoegd');
        return Redirect::to('home');
    }


    public function delete( $id) {

            $chapter = Chapter::findOrFail($id);
            $chapter->delete($id);
            Session::flash('message', 'Hoofdstuk veilig verwijderd');
            return Redirect::back();
        }






    public function editChap($id)
    {
        $chap = Chapter::find($id);
        return view("editChapter")
            ->with('chap',$chap);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateChap(Request $request, $id)
    {
        $rules = array(
            'nr' => 'required|integer|min:1',
            'chapter' => 'required|string|max:100'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $chap               = Chapter::find($id);
            $chap->nr           = Input::get('nr');
            $chap->chapter          = Input::get('chapter');
            $chap->save();

            Session::flash('message', ' Aangepast!!');
            return Redirect::back();
        }
    }

    public function editSub($id)
    {
        $allChapters = Chapter::all();
        $sub = Subchapter::find($id);
        return view("editSubchapter")
            ->with('sub', $sub)
            ->with('allChapters',$allChapters);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSub(Request $request, $id)
    {
        $rules = array(
            'nr' => 'required|integer|min:1',
            'name' => 'required|string|max:100',
            'chapter' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $sub               = Subchapter::find($id);
            $sub->nr     = Input::get('nr');
            $sub->name       = Input::get('name');
            $sub->save();

            Session::flash('message', ' Aangepast!!');
            return Redirect::back();
        }
    }



    public function add_subchapter(Request $request) {

        $this->validate($request, [
            'nr' => 'required|integer|min:1',
            'name' => 'required|string|max:100',
            'chapter' => 'required',
        ]);

        $subchapter = new Subchapter([
            'nr' => $request->nr,
            'name' => $request->name,
            'chapter_id' => $request->chapter
        ]);
        $subchapter->save();

        Session::flash('message', 'Subhoofdstuk toegevoegd');
        return redirect('addSubChapter');
    }












}




























