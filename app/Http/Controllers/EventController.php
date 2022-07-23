<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class EventController extends Controller
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
      $events=Event::doesnthave('client')->with('groupActivity')->where('start','<',date('Y-m-d H:i:s'))->get();
       $myEvents=Event::whereHas('client', function($q){
        $q->where('client_id',Auth::user()->client->id);
        })->get();

        return view('event.index',compact('events','myEvents'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $input = $request->only(['title', 'start', 'end']);

        $request_data = [
            'title' => 'required',
            'start' => 'required',
            'end' => 'required'
        ];

        $validator = Validator::make($input, $request_data);

        // invalid request
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong, please check all parameters',
            ]);
        }

        $event = Event::create([
            'title' => $input['title'],
            'start' => $input['start'],
            'serviceDelivery' => 'Phone',
            'end' => $input['end'],
        ]);

        return response()->json([
            'success' => true,
            'data' => $event
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return "Store";
    }
    public function RegisterClient(Request $request)
    {
  try{
     if(DB::table('client_event')->where(['client_id'=>Auth::user()->client->id,'event_id'=>$request->id,])->exists()){
       return redirect()->route('Events.index')->with('info',"Already Registered to that Event");
     }
     else{

        DB::table('client_event')
        ->insert([
             'client_id'=>Auth::user()->client->id,
             'event_id'=>$request->id,
        ]);
      
       return  redirect()->route('Events.index')->with('message','Registered Successfully');
     }

      
    } catch (\Exception $th) {
        return redirect()->route('Events.index')->with('error',$th->getMessage());
    }
    }
    public function UnRegisterClient(Request $request)
    {
  try{

        DB::table('client_event')
        ->where([
             'client_id'=>Auth::user()->client->id,
             'event_id'=>$request->id,
        ])->delete();
        // return $event->clients();
       return  redirect()->route('Events.index')->with('message','Un Registered Successfully');
    } catch (\Exception $th) {
        return redirect()->route('Events.index')->with('error',$th->getMessage());
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event, $id)
    {

        $event= Event::with('groupActivity')->where('id',$id)->first();
        return view('event.show',compact('event'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $input = $request->only(['id', 'title', 'start', 'end']);

        $request_data = [
            'id' => 'required',
            'title' => 'required',
            'start' => 'required',
            'end' => 'required'
        ];

        $validator = Validator::make($input, $request_data);

        // invalid request
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong, please check all parameters',
            ]);
        }

        $event = Event::where('id', $input['id'])
            ->update([
                'title' => $request['title'],
                'start' => $request['start'],
                'end' => $request['end'],
            ]);

        return response()->json([
            'success' => true,
            'data' => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        return "Update";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        return "Destroy";
    }

    public function getEvents()
    {

       return Event::all();
    }

    public function getDates(Request $request)
    {
        if ($request->ajax()) {
            $events = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end', '<=', $request->end)
                ->get();

            return response()->json($events);
        }

        return view('event.calender');
    }
}
