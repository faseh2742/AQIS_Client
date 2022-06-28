<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile=Auth::user();
        return view('user.profile',compact('profile'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client,$id)
    {
           $client= Client::where('id',$id)->with('user')->first();
           return view('user.editprofile',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client,$id)
    {

        try {


        User::where('client_id',Auth::user()->client->id)->update([
            'firstName'=>$request->firstName,
            'lastName'=>$request->lastName,
            'email'=>$request->email,
         ]);
         $client=Client::find($id);
         $client->user_id=Auth::id();
         $client->wc_id=$request->wc_id;
         $client->immigrationStatus=$request->immigrationStatus;
         $client->dob=$request->dob;
         $client->doa=$request->doa;
         $client->gender=$request->gender;
         $client->streetAddress=$request->streetAddress;
         $client->city=$request->city;
         $client->province=$request->province;
         $client->postalCode=$request->postalCode;
         $client->phonePrimary=$request->phonePrimary;
         $client->phoneSecondary=$request->phoneSecondary;
         $client->motherTongue=$request->motherTongue;
         $client->countryOrigin=$request->countryOrigin;
         $client->engProficiency=$request->engProficiency;
         $client->interpreterNeeded=$request->interpreterNeeded;
         $client->interpreterLanguage=$request->interpreterLanguage;
         $client->childcareNeeded=$request->childcareNeeded;
         $client->notes=$request->notes;
         $client->update();



         return redirect()->route('Clients.index')->with('message', 'Successfully Updated');
               //code...
        } catch (\Exception $th) {
            return redirect()->route('Clients.index')->with('error',$th->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
