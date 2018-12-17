<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        $no = 1;
        return view('author.index', compact('authors','no'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            
        ]);

        $author = new Author([
                'name' => $request->get('name'),
               
        ]);

        $author->save();
      //  return redirect('/shares/create');

        return redirect('/author')->with('succes', 'Author data has been added');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function show(Share $share)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $author = Author::find($id);
        return view('author.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'name' => 'required',
           
        ]);

        $author = Author::find($id);
        $author->name = $request->get('name');
        $author->save();
      
        return redirect('/author')->with('succes', 'Author data has been updated');


    }

    public function destroy($id)
    {
        $author = Author::find($id);
        $author->delete();
         return redirect('/author')->with('succes', 'Author data has been deleted');
    }}
