<?php

namespace App\Http\Controllers;

use App\Title;
use Illuminate\Http\Request;

class TitlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'titles' => Title::orderBy('title', 'asc')->paginate(8),
            'title' => 'Lijst met titels'
        );

        return view('titles.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // ******************************************
        // Joan van Duren
        // 04-12-2020
        // Nieuwe functionaliteit
        // ******************************************
        $data = array(
            'title' => 'Maak een nieuwe titel'
        );
        return view('titles.create')->with($data);
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
        // Nieuwe functionaliteit
        // ******************************************
        $this->validate($request, [
            'title_id' => 'required',
            'title' => 'required',
            'type' => 'required'
        ]);
        // Werk de title  bij op basis van id
        $title = new Title;
        $title->title_id = $request->input('title_id');
        $title->title = $request->input('title');
        $title->type = $request->input('type');
        $title->pub_id = $request->input('pub_id');
        $title->price = $request->input('price');
        $title->advance = $request->input('advance');
        $title->royalty = $request->input('royalty');
        $title->ytd_sales = $request->input('ytd_sales');
        $title->notes = $request->input('notes');
        $title->save();
        return redirect('/titles')->with('success', 'Titel aangemaakt');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // ******************************************
        // Joan van Duren
        // 04-12-2020
        // Nieuwe functionaliteit
        // ******************************************
        $titleFound = title::find($id);
        return view('titles.show')->with('titleFound', $titleFound);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // ******************************************
        // Joan van Duren
        // 04-12-2020
        // Nieuwe functionaliteit
        // let op dat je niet tweemaal variabele title gebruikt
        // dus vandaar titleFound
        // ******************************************
        $data = array(
            'titleFound' => Title::find($id),
            'title' => 'Wijzig titel gegevens'
        );
        return view('titles.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // ******************************************
        // Joan van Duren
        // 04-12-2020
        // Nieuwe functionaliteit
        // ******************************************
        $this->validate($request, [
            'title_id' => 'required',
            'title' => 'required',
            'type' => 'required'
        ]);
        // Werk de title  bij op basis van id
        $title = Title::find($id);
        $title->title_id = $request->input('title_id');
        $title->title = $request->input('title');
        $title->type = $request->input('type');
        $title->pub_id = $request->input('pub_id');
        $title->price = $request->input('price');
        $title->advance = $request->input('advance');
        $title->royalty = $request->input('royalty');
        $title->ytd_sales = $request->input('ytd_sales');
        $title->notes = $request->input('notes');
        $title->save();
        return redirect('/titles')->with('success', 'Titel gewijzigd');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // ******************************************
        // Joan van Duren
        // 04-12-2020
        // Nieuwe functionaliteit
        // ******************************************
        $titleFound = title::find($id);
        $titleFound->delete();
        return redirect('/titles')->with('success', 'Titel verwijderd');
    }
}
