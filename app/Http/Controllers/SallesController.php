<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Salles;
use App\User;
use App\Materiels;
use App\Http\Controlles\Auth\AuthController;
use App\Type_materiels;

class SallesController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $salles = Salles::with('user')->where('name', '!=', 'Stock')->get();
        return view('salles.index', compact('salles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $salle = Salles::create($request->all());
        $user = User::findOrFail($request['user_id']);
        $salle->user()->associate($user);
        $salle->save();
        return redirect(route('salles.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $salle = Salles::findOrFail($id);
        $materiels = Materiels::where('salle_id', $id)->get();

        return view('salles.details', compact('salle', 'materiels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $salle = Salles::findOrFail($id);
        return view('salles.edit', compact('salle'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        $salle = Salles::find($id);
        $salle->delete();

        return redirect(route('salles.index'));
    }
}
