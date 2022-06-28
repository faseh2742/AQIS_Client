<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
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
    //    return  Document::with('client','user')->get();
        $documents = Document::with('user')->whereHas('client', function ($q) {
            $q->where('client_id', Auth::user()->client->id);
        })->get();
        return view('user.document', compact('documents'));
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
        try {
            $doc_file="";
            if ($request->has('doc_file')) {
               $doc_file= $request->file('doc_file')->store('images','public');


            }
            if(Document::where(['doc_name'=>$request->doc_name,'client_id'=>Auth::user()->client->id])->exists()){
                return redirect()->route('Document.index')->with('error', 'Document Already Uploaded');
            }
            else{
            $document = new Document();
            $document->doc_name = $request->doc_name;
            $document->doc_file = $doc_file;
            $document->client_id = Auth::user()->client->id;
            $document->user_id = Auth::id();
            $document->save();
            return redirect()->route('Document.index')->with('message', 'Successfully Created');
            }
        } catch (\Exception $th) {
            return redirect()->route('Document.index')->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document, $id)
    {
        // return Document::where(['client_id'=>Auth::user()->client->id])->where('doc_name',$request->doc_name)->exists();
        try {
            $doc_file="";
            if ($request->has('doc_file')) {

            //    $doc_file= $request->file('doc_file')->store('images','public');
               $file = $request->file('doc_file');
               $file->move(public_path('images'),date('Y-m-d').$file->getClientOriginalName());

            }
            if(!Document::where('doc_name',$request->doc_name)->where(['client_id'=>Auth::user()->client->id])->exists()){



                $document = Document::find($id);
                $document->doc_name = $request->doc_name;
                $document->doc_file = $doc_file;
                $document->client_id = Auth::user()->client->id;
                $document->user_id = Auth::id();
                $document->update();
                return redirect()->route('Document.index')->with('message', 'Successfully Updated');
             }

            else{
                return redirect()->route('Document.index')->with('error', 'Document Already Uploaded');

            }


        } catch (\Exception $th) {
            return redirect()->route('Document.index')->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document,$id)
    {
        try {
            $document = Document::find($id)->delete();
            return redirect()->route('Document.index')->with('message', 'Successfully Deleted');
        } catch (\Exception $th) {
            return redirect()->route('Document.index')->with('error', $th->getMessage());
        }
    }
}
