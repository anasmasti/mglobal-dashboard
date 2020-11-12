<?php

namespace App\Http\Controllers\mediexperts_academy;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participant = Participant::all();
        return response()->json($participant);
    }

    public function getcount()
    {
        $participant = Participant::all()->count();
        return response()->json($participant);
    }

    public function getlastsparticipants()
    {
        $participant = Participant::orderBy('id', 'desc')->take(5)->get();
        return response()->json($participant);
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
        Participant::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $participant = Participant::findOrFail($id);
        return response()->json($participant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit(Participant $participant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $participant = Participant::findOrFail($id);
        $participant->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $participant = Participant::findOrFail($id);
        $participant->delete();
    }
}
