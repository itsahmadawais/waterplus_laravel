<?php

namespace App\Http\Controllers;

use App\Models\Sectors;
use Illuminate\Http\Request;

class SectorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectors = Sectors::all();
        return view('pages.sectors.all',[
            'sectors' => $sectors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.sectors.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sector_title' => 'required | min: 1 | unique:sectors'
        ]);
        $sector = Sectors::create([
            'sector_title' => $request->sector_title
        ]);
        return redirect('sectors');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sectors  $sectors
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sector = Sectors::findOrFail($id);
        return view('pages.sectors.edit',[
            'sector' => $sector
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sectors  $sectors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sectors $sectors)
    {
        $id = $request->sector_id;
        $sector = Sectors::findOrFail($id);
        $sector->sector_title = $request->sector_title;
        $sector->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sectors  $sectors
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $sector = Sectors::find($id);
        $sector->delete();
        return redirect('sectors');
    }
}
