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
        // ******************************************
        // Joan van Duren
        // 04-12-2020
        // Foutmelding doordat waardes niet NULL mogen zijn.
        // Foutmelding:
        // ==========================================
        // Illuminate \ Database \ QueryException (23000)
        // SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'au_fname' cannot be null (SQL: insert into `authors` (`au_id`, `au_fname`, `au_lname`, `phone`, `address`, `city`, `state`, `zip`, `nationality`, `contract`, `updated_at`, `created_at`) values (aaa, ?, Jansen, ?, ?, ?, ?, ?, ?, 0, 2020-12-04 13:29:16, 2020-12-04 13:29:16))
        // Previous exceptions
        // SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'au_fname' cannot be null (23000)
        // ==========================================
        // Hieronder velden toegevoegd aan validate:
        // au_fname, phone, nationality, contract niet omdat die anders wordt geregeld
        // en maak controleer op unieke key (unique:authors)
        // ******************************************
        $this->validate($request, [
            'au_id' => 'required|unique:authors',
            'au_lname' => 'required',
            'au_fname' => 'required',
            'phone' => 'required',
            'nationality' => 'required',
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
        $authors->nationality = $request->input('nationality');
        // contract veld controleren indien geen 1 dan staat het op NULL (mag niet)
        // dus op 0 zetten
        $contract_value = $request->input('contract');
        if (is_null($contract_value)) {
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
            'author' => Author::find($id),
            'title' => 'Wijzig auteurs gegevens'
        );
        // geef variabele aan view en toon view
        // ******************************************
        // 04-12-2020
        // Joan van Duren
        // Bug:
        // De view gaf een 404 op het moment van wijzig keuze
        // Er stond 2x authors in de adresregel.
        // In onderstaande regel authors/ verwijderd
        // ******************************************
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

        // ******************************************
        // Joan van Duren
        // 04-12-2020
        // Foutmelding doordat waardes niet NULL mogen zijn.
        // Foutmelding:
        // ==========================================
        // Illuminate \ Database \ QueryException (23000)
        // SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'au_fname' cannot be null (SQL: insert into `authors` (`au_id`, `au_fname`, `au_lname`, `phone`, `address`, `city`, `state`, `zip`, `nationality`, `contract`, `updated_at`, `created_at`) values (aaa, ?, Jansen, ?, ?, ?, ?, ?, ?, 0, 2020-12-04 13:29:16, 2020-12-04 13:29:16))
        // Previous exceptions
        // SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'au_fname' cannot be null (23000)
        // ==========================================
        // Hieronder velden toegevoegd aan validate:
        // au_fname, phone, nationality, contract niet omdat die anders wordt geregeld
        // ******************************************
        $this->validate($request, [
            'au_id' => 'required',
            'au_lname' => 'required',
            'au_fname' => 'required',
            'phone' => 'required',
            'nationality' => 'required'
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
        $author->nationality = $request->input('nationality');
        $contract = $request->input('contract');
        if (is_null($contract)) {
            $contract = 0;
        };
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
