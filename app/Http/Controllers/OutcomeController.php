<?php

namespace App\Http\Controllers;

use App\Models\Outcome;
use App\Models\Category;
use App\Models\Client;
use App\Models\ClientOutcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OutcomeController extends Controller
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
        //  return   Client::where('id',Auth::user()->client->id)->first();
        return view('user.outcome');
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
        try{
        $clientOutcome= new ClientOutcome();
        $clientOutcome->category_id=$request->category_id;
        $clientOutcome->client_id=Auth::user()->client->id;
        $clientOutcome->outcome_id=$request->outcome_id;
        $clientOutcome->status=$request->status;
        $clientOutcome->notes=$request->notes;
        $clientOutcome->save();
        return redirect()->route('Outcome.index')->with('message',"Successfully Created");
    } catch (\Exception $th) {
        return redirect()->route('Outcome.index')->with('error',$th->getMessage());
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outcome  $outcome
     * @return \Illuminate\Http\Response
     */
    public function show(Outcome $outcome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outcome  $outcome
     * @return \Illuminate\Http\Response
     */
    public function edit(Outcome $outcome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outcome  $outcome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outcome $outcome)
    {
        try{
        $clientOutcome=ClientOutcome::find($request->id);
        $clientOutcome->category_id=$request->category_id;
        $clientOutcome->client_id=Auth::user()->client->id;
        $clientOutcome->outcome_id=$request->outcome_id;
        $clientOutcome->status=$request->status;
        $clientOutcome->notes=$request->notes;
        $clientOutcome->save();
        return redirect()->route('Outcome.index')->with('message',"Successfully Updated");
    } catch (\Exception $th) {
        return redirect()->route('Outcome.index')->with('error',$th->getMessage());
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outcome  $outcome
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outcome $outcome , $id)
    {
        try{


        Outcome::find($id)->delete();
        return redirect()->route('Outcome.index')->with('message',"Successfully Deleted");
    } catch (\Exception $th) {
        return redirect()->route('Outcome.index')->with('error',$th->getMessage());
    }
    }
}
