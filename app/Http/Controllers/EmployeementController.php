<?php

namespace App\Http\Controllers;

use App\Models\Employeement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeementController extends Controller
{
    private $client_id;
    public function __construct()
    { $this->client_id=\App\Models\Client::where('user_id',Auth::id())->pluck('id')->first();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $myEmployeement=Employeement::with('currentnoc')->whereHas('client', function($q){
            $q->where('client_id',Auth::user()->client->id);
            })->get();
        return view('user.employeement',compact('myEmployeement'));
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

        $employeement =new Employeement();
       $employeement->country=$request->country;
       $employeement->job_title=$request->job_title;
       $employeement->current_noc=$request->current_noc;
       $employeement->experience_years=$request->experience_years;
       $employeement->client_id=Auth::user()->client->id;
       $employeement->save();
       return redirect()->route('Employeement.index')->with('message','Successfully Created');
    } catch (\Exception $th) {
        return redirect()->route('Employeement.index')->with('error',$th->getMessage());
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employeement  $employeement
     * @return \Illuminate\Http\Response
     */
    public function show(Employeement $employeement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employeement  $employeement
     * @return \Illuminate\Http\Response
     */
    public function edit(Employeement $employeement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employeement  $employeement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employeement $employeement)
    {
        try{

        $employeement =Employeement::find($request->id);
        $employeement->country=$request->country;
        $employeement->job_title=$request->job_title;
        $employeement->current_noc=$request->current_noc;
        $employeement->experience_years=$request->experience_years;
        $employeement->client_id=Auth::user()->client->id;
        $employeement->update();
        return redirect()->route('Employeement.index')->with('message','Successfully Updated');
    } catch (\Exception $th) {
        return redirect()->route('Employeement.index')->with('error',$th->getMessage());
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employeement  $employeement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employeement $employeement,$id)
    {
        try {


        Employeement::find($id)->delete();
        return redirect()->route('Employeement.index')->with('message','Successfully Deleted');
    } catch (\Exception $th) {
        return redirect()->route('Employeement.index')->with('error',$th->getMessage());
    }
    }
}
