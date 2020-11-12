<?php

namespace App\Http\Controllers\mysys;

use App\Http\Controllers\Controller;
use App\Models\MysysContact;
use Illuminate\Http\Request;

class MysysContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = MysysContact::all();
        return response()->json($contact);
    }

    public function getlastsmessages()
    {
        $messages = MysysContact::orderBy('id', 'desc')->take(5)->get();
        return response()->json($messages);
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
        MysysContact::create($request->all());

        Mail::raw('
        Salut,
        Tu as reçu un nouveau message,
        Merci.
        ', function ($m){
        $m->from('mediexpertsapp@gmail.com', 'MySYS');
        $m->subject('Nouveau Message');
        $m->to('anasmasti10@gmail.com','aymanelassfar@outlook.com');
      });
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MysysContact  $mysysContact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mysysContact = MysysContact::findOrFail($id);
        return response()->json($mysysContact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MysysContact  $mysysContact
     * @return \Illuminate\Http\Response
     */
    public function edit(MysysContact $mysysContact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MysysContact  $mysysContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $mysysContact = MysysContact::findOrFail($id);
        $mysysContact->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MysysContact  $mysysContact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mysysContact = MysysContact::findOrFail($id);
        $mysysContact->delete();
    }
}
