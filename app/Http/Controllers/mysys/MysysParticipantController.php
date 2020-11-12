<?php

namespace App\Http\Controllers\mysys;

use App\Http\Controllers\Controller;
use App\Models\MysysParticipant;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MysysParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participant = MysysParticipant::with('mysysformation')
        ->orderBy('id', 'desc')
        ->get();
        return response()->json($participant);
    }

    public function getcount()
    {
        $participant = MysysParticipant::all()->count();
        return response()->json($participant);
    }

    public function getlastsparticipants()
    {
        $participant = MysysParticipant::orderBy('id', 'desc')->take(5)->get();
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
      MysysParticipant::create($request->all()); 

      Mail::raw('
      Salut,
      Un nouveau participant est là,
      Merci.
      ', function ($m){
      $m->from('mediexpertsapp@gmail.com', 'MySYS');
      $m->subject('Nouveau Participant');
      $m->to('anasmasti10@gmail.com','aymanelassfar@outlook.com');
      });
    }

    // public function storeFormationParticipant(Request $request)
    // {
    //     $form_par = new FormationParticipant;
    //     $form_par->mf_id = $particp->id;
    //     $form_par->mp_id = $mp_id;
    //     $form_par->save();
    // }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MysysParticipant  $mysysParticipant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $participant = MysysParticipant::with('mysysformation')->findOrFail($id);
        return response()->json($participant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MysysParticipant  $mysysParticipant
     * @return \Illuminate\Http\Response
     */
    public function edit(MysysParticipant $mysysParticipant)
    {
        //
    }

    public function getParticipantPerDay(MysysParticipant $mysysParticipant)
    {
       $participantperday = MysysParticipant::select([
        DB::raw('DATE(created_at) AS date'),
        DB::raw('COUNT(id) AS count'),
       ])
       ->whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])
       ->groupBy('date')
       ->orderBy('date', 'ASC')
       ->get();

       return response()->json($participantperday);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MysysParticipant  $mysysParticipant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $participant = MysysParticipant::findOrFail($id);
        $participant->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MysysParticipant  $mysysParticipant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $participant = MysysParticipant::findOrFail($id);
        $participant->delete();
    }
}
