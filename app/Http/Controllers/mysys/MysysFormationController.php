<?php

namespace App\Http\Controllers\mysys;

use App\Http\Controllers\Controller;
use App\Models\MysysFormation;
use Illuminate\Http\Request;

class MysysFormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formation = MysysFormation::all();
        return response()->json($formation);
    }
    
    public function getcount()
    {
        $formation = MysysFormation::all()->count();
        return response()->json($formation);
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
        MysysFormation::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MysysFormation  $mysysFormation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formation = MysysFormation::findOrFail($id);
        return response()->json($formation);
    }

    public function getFormationsByTheme($theme_id)
    {
        $formationsbytheme = MysysFormation::all()->where('mysystheme_id',$theme_id );
        return response()->json($formationsbytheme);
    }

    public function getFormationsByCat($cat)
    {
        $formationsbycat = MysysFormation::all()->where('category',$cat)->take(5);
        return response()->json($formationsbycat);
    }

    public function getGlobalEvent()
    {
        $formationsbytheme = MysysFormation::all()->where('global_event', true )->take(1)->get();
        return response()->json($formationsbytheme);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MysysFormation  $mysysFormation
     * @return \Illuminate\Http\Response
     */
    public function edit(MysysFormation $mysysFormation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MysysFormation  $mysysFormation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $formation = MysysFormation::findOrFail($id);
        $formation->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MysysFormation  $mysysFormation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formation = MysysFormation::findOrFail($id);
        $formation->delete();
    }
}
