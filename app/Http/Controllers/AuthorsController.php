<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
        'authors' => Author::orderBy('au_lname', 'asc')->paginate(8),
        'title' => 'Lijst met auteurs' 
        );
        
        return view('authors.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Maak een nieuwe auteur' 
        );
        return view('authors.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validatie
        $this -> validate($request,[
            'au_id' => 'required',
            'au_lname' => 'required'
        ]);
        // Maak een nieuwe medewerker (in database) mbv model
        $authors = new Author;
        $authors->au_id = $request->input('au_id');
        $authors->au_fname = $request->input('au_fname');
        $authors->au_lname = $request->input('au_lname');
        $authors->phone = $request->input('phone');
        $authors->address = $request->input('address');
        $authors->city = $request->input('city');
        $authors->state = $request->input('state');
        $authors->zip = $request->input('zip');
        // contract veld controleren indien geen 1 dan staat het op NULL (mag niet)
        // dus op 0 zetten
        $contract_value = $request->input('contract');
        if(is_null($contract_value)){
            $contract_value = 0;
        }
        $authors->contract = $contract_value;
        $authors->save();
        return redirect('/authors')->with('success', 'Auteur aangemaakt');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // zoek een auteur op id en stop in variabele $auteur
        $author = author::find($id);
        // geef variabele aan view en toon view
        return view('authors.show')->with('author', $author);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array(
            // zoek een afdeling op id en stop in variabele afdeling
            'author' => Author::find($id),
            'title' => 'Wijzig auteurs gegevens' 
        );
        // geef variabele aan view en toon view
        return view('authors.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validatie
        $this -> validate($request,[
            'au_id' => 'required',
            'au_lname' => 'required'
        ]);
        // Werk de author  bij op basis van id
        $author = Author::find($id);
        $author->au_id = $request->input('au_id');
        $author->au_lname = $request->input('au_lname');
        $author->au_fname = $request->input('au_fname');
        $author->address = $request->input('address');
        $author->city = $request->input('city');
        $author->phone = $request->input('phone');
        $author->state = $request->input('state');
        $author->zip = $request->input('zip');
        $contract = $request->input('contract');
        if(is_null($contract)){$contract = 0;};
        $author->contract = $contract;
        $author->save();
        return redirect('/authors')->with('success', 'Auteur gewijzigd');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::find($id);
        $author->delete();
        return redirect('/authors')->with('success', 'Auteur verwijderd');
    }
}
