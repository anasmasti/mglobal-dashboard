<?php

namespace App\Http\Controllers\mysys;

use App\Http\Controllers\Controller;
use App\Models\MysysDomaine;
use Illuminate\Http\Request;

class MysysDomaineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domaine = MysysDomaine::all();
        return response()->json($domaine);
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
        $request->validate([
            'name' => 'required|max:255',
        ]);
        MysysDomaine::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MysysDomaine  $mysysDomaine
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $domaine = MysysDomaine::findOrFail($id);
        return response()->json($domaine);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MysysDomaine  $mysysDomaine
     * @return \Illuminate\Http\Response
     */
    public function edit(MysysDomaine $mysysDomaine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MysysDomaine  $mysysDomaine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MysysDomaine $mysysDomaine)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $domaine = MysysDomaine::findOrFail($id);
        $domaine->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MysysDomaine  $mysysDomaine
     * @return \Illuminate\Http\Response
     */
    public function destroy(MysysDomaine $mysysDomaine)
    {
        $domaine = MysysDomaine::findOrFail($id);
        $domaine->delete();
    }
}
