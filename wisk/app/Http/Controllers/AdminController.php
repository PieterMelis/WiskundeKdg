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



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function delete( $id) {

            $chapter = Chapter::findOrFail($id);
            $chapter->delete($id);
            Session::flash('message', 'Hoofdstuk veilig verwijderd');
            return Redirect::back();
        }


















/*----------------------------------------SubShapters----------------------------------------*/



    public function indexSubChapter() {
        $allChapters = Chapter::all();
        return View::make("addSubChapter")
            ->with('allChapters', $allChapters);
    }
    public function show_add_subchapter() {

        $chapters = Chapter::all();

        return view('');
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




























