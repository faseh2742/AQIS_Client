<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainingController extends Controller
{
    private $client_id;
    public function __construct()
    { $this->client_id=\App\Models\Client::where('user_id',\Illuminate\Support\Facades\Auth::id())->pluck('id')->first();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $myTrainings=Training::whereHas('client', function($q){
            $q->where('client_id',Auth::user()->client->id);
            })->get();
        return view('user.training',compact('myTrainings'));
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
        $training =new Training();
        $training->subject=$request->subject;
        $training->association=$request->association;
        $training->training_year=$request->training_year;
        $training->country=$request->country;
        $training->client_id=Auth::user()->client->id;
        $training->save();
        return redirect()->route('Training.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $training)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Training $training)
    {
        $training =Training::find($request->id);
        $training->subject=$request->subject;
        $training->association=$request->association;
        $training->training_year=$request->training_year;
        $training->country=$request->country;
        $training->client_id=Auth::user()->client->id;
        $training->update();
        return redirect()->route('Training.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy(Training $training, $id)
    {
        Training::find($id)->delete();
        return redirect()->route('Training.index');

    }
}
