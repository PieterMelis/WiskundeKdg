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

class SubController extends Controller
{
    public function __construct() {
        $this->middleware( 'admin' );
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
