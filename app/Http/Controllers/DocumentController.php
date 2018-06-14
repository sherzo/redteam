<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use Auth;
use Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back-end.documents.index');
    }

    public function all() 
    {
        $user = Auth::user();

        $documents = Document::where('user_id', $user->id)
        ->whereNull('parent_id')
            ->get();
        
        return $documents;
    }

    public function getSubdocuments($id)
    {
        $document = Document::find($id);

        $subdocuments = $document->subdocuments;

        return $subdocuments;
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
        $user = Auth::user();

        if($request->hasFile('file')) {

            if($request->parent_id){
                $parent = Document::find($request->parent_id);
                $path = $parent->path;
            }else {
                $path = 'documents/'. $user->username . '/';
            }

            $file = $request->file('file');
            $name = $file->getClientOriginalName();

            $name = str_replace(' ', '', $name);
            $total = strlen($name);
            
            if($total > 10) {
                $name = substr($name, 0, 8);
            }else if (($total / 2) > 5) {   
                $name = substr($name, 0, 5);
            }

            $name = $this->setFileName($name);

            $path = $file->store($path, 'local');
        }

        $document = Document::create([
            'user_id' => $user->id,
            'type' => true,
            'name' => $name,
            'path' => $path,
            'parent_id' => $request->parent_id
        ]);

        $document->active = false;
        return $document;
    }

    private function setFileName($name, $parent_id = null, $count = 0) 
    {
        $count++;
        $exists = Document::where('name', $name)
            ->where('parent_id', $parent_id)
            ->where('user_id', Auth::user()->id)
            ->exists();
        
        if($exists) {
            $name .= '('.$count.')'; 
            $count++;
            $this->setFileName($name, $parent_id, $count);
        }

        return $name;
    }

    public function addFolder(Request $request) 
    {
        $user = Auth::user();

        $name = str_replace(' ', '_', $request->name);

        if($request->parent_id){
            $parent = Document::find($request->parent_id);
            $path = $parent->path  . '/' . $name;
        }else {
            $path = 'documents/'. $user->username . '/' .  $name;
        }

        $document = new Document([
            'user_id' => $user->id,
            'parent_id' => $request->parent_id,
            'name' => $name,
            'path' => $path
        ]);

        $document->save();

        Storage::makeDirectory($document->path);

        $document->active = false;

        return $document;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $document
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
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
