<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{
    // private $client_id = 3432;
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
        

        $myEducation = Education::whereHas('client', function ($q) {
            $q->where('client_id', Auth::user()->client->id);
        })->get();
        return view('user.education', compact('myEducation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "Create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $education = new Education();
            $education->education_country = $request->education_country;
            $education->major = $request->major;
            $education->graduation_date = $request->graduation_date;
            $education->education_level = $request->education_level;
            $education->client_id = Auth::user()->client->id;
            $education->save();
            return redirect()->route('Education.index')->with('message', 'Successfully Created');
        } catch (\Exception $th) {
            return redirect()->route('Education.index')->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        return Education::find($education->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        return "Edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        try {
            $education = Education::find($request->id);
            $education->education_country = $request->education_country;
            $education->major = $request->major;
            $education->graduation_date = $request->graduation_date;
            $education->education_level = $request->education_level;
            $education->client_id = Auth::user()->client->id;
            $education->update();
            return redirect()->route('Education.index')->with('message', 'Successfully Updated');
        } catch (\Exception $th) {
            return redirect()->route('Education.index')->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education, $id)
    {
        try {
            Education::find($id)->delete();
            return redirect()->route('Education.index')->with('message', 'Successfully Deleted');
        } catch (\Exception $th) {
            return redirect()->route('Education.index')->with('error', $th->getMessage());
        }
    }
    public function setHigh(Request $request)
    {
        try {

            Client::find(Auth::user()->client->id)->update(['highestEducation_id' => $request->id]);
            return redirect()->route('Education.index')->with('message', 'Major Subject Selected Successfully');
        } catch (\Exception $th) {
            return redirect()->route('Education.index')->with('error', $th->getMessage());
        }
    }
}
