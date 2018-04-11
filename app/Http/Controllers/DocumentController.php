<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $document = Document::all();
        return view('index', ['document' => $document]);
    }

    /**
     * Store a newly created row in db.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $document = new Document;
        $document->create($request->all());
        Session::flash('success', 'Successfully store!');
        return Redirect::to('/');
    }

    /**
     * Show the form for editing the row.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $row = Document::find($id);
        return view('update', ['row' => $row]);
    }

    /**
     * Update the row in db
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        Document::find($id)->update($request->all());
        Session::flash('success', 'Successfully updated!');
        return Redirect::to('/');
    }

    /**
     * Remove the row from db.
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $row = Document::find($id);
        $row->delete();

        Session::flash('success', 'Successfully deleted!');
        return Redirect::to('/');
    }
}
