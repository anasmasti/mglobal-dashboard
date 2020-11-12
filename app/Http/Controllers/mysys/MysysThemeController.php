<?php

namespace App\Http\Controllers\mysys;

use App\Http\Controllers\Controller;
use App\Models\MysysTheme;
use Illuminate\Http\Request;

class MysysThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theme = MysysTheme::all();
        return response()->json($theme);
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
        MysysTheme::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MysysTheme  $mysysTheme
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $theme = MysysTheme::findOrFail($id);
        return response()->json($theme);
    }

    public function getThemeByDomaine($domaine_id)
    {
        $themebydomaine = MysysTheme::all()->where('mysysdomain_id',$domaine_id );
        return response()->json($themebydomaine);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MysysTheme  $mysysTheme
     * @return \Illuminate\Http\Response
     */
    public function edit(MysysTheme $mysysTheme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MysysTheme  $mysysTheme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $theme = MysysTheme::findOrFail($id);
        $theme->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MysysTheme  $mysysTheme
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $domaine = MysysTheme::findOrFail($id);
        $domaine->delete();
    }
}
