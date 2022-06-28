<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientQuestion;
use App\Models\Meeting;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeetingController extends Controller
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


        $upcomingmeetings=Meeting::with('staff')->where('client_id',Auth::user()->client->id)->where('date','>',date('Y-m-d'))->get();
        $pastmeetings=Meeting::with('staff')->where([ 'client_id'=>Auth::user()->client->id])->where('date','<',date('Y-m-d'))->get();
        return view('meeting.index',compact('upcomingmeetings','pastmeetings'));
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
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function show(Meeting $meeting,$id)
    {
        $meeting=Meeting::find($id);
        $questions=Question::all();

         return view('meeting.feedback',compact('questions','meeting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function edit(Meeting $meeting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meeting $meeting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meeting $meeting,$id)
    {

        try {
            ClientQuestion::find($id)->delete();
            return redirect()->route('Meeting.index')->with('message', 'Successfully Deleted');
        } catch (\Exception $th) {
            return redirect()->route('Meetings.index')->with('error', $th->getMessage());
        }
    }
}
