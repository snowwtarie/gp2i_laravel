<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Salles;
use App\Type_materiels;
use App\Http\Requests;
use App\Caracteristiques;
use App\Materiels;

class MaterielsController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $salles = Salles::get();
        $type_materiels = Type_materiels::get();

        return view('materiels.create', compact('salles', 'type_materiels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $materiel = Materiels::create($request->all());
        $type = Type_materiels::findOrFail($request['type_materiel_id']);
        $materiel->type_materiel()->associate($type);
        $materiel->save();
        $caracs = Caracteristiques::where('materiel_id', 0)->get();
        //$caracs->update(array('materiel_id' => $materiel->id));

        foreach($caracs as $carac) {
            $carac->materiel_id = $materiel->id;
            $carac->save();
        }

        return redirect(route('salles.show', $materiel->salle_id));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $salles = Salles::get();
        $type_materiels = Type_materiels::get();
        $materiel = Materiels::find($id);
        $type = Type_materiels::where('id', $materiel->type_materiel_id)->first();
        $caracteristiques = Caracteristiques::where('materiel_id', $materiel->id)->get();

        return view('materiels.edit', compact('materiel', 'type', 'caracteristiques', 'salles', 'type_materiels'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $materiel = Materiels::findOrFail($id);
        $materiel->fill($request->all());
        $materiel->save();

        return redirect(route('materiels.edit', $id));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        $materiel = Materiels::findOrFail($id);
        $caracteristiques = Caracteristiques::where('materiel_id', $materiel->id)->get();
        foreach($caracteristiques as $carac) {
            $carac->delete();
        }

        $materiel->delete();

    }
}
