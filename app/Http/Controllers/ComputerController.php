<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\glpi_computers;
use App\Models\glpi_computertypes;
use App\Models\glpi_fabricant;
use App\Models\glpi_computermodels;
use App\Models\glpi_reseaux;
use App\Models\glpi_SourceMiseAjour;
use App\Models\User;
use App\Models\glpi_location;
use App\Models\glpi_groups;
class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $computers = glpi_computers::all();
        $title = 'GLPI-Ordinateurs';
        $header = 'Ordinateurs';
        return view('front.computer')->with([
            'title' => $title,
            'computers' => $computers,
            'header' => $header
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'GLPI-Ordinateurs --1';
        $header = 'Ordinateurs';
        $types = glpi_computertypes::all();
        $Fabricants = glpi_fabricant::all();
        $Models = glpi_computermodels::all();
        $Reseaux = glpi_reseaux::all();
        $SourceMiseAjours = glpi_SourceMiseAjour::all();
        $user = User::all();
        $groups =glpi_groups::all();
        return view('front.ComputerForm')->with([
            'title' => $title,
            'header' => $header,
            'Types' => $types,
            'Fabricants' => $Fabricants,
            'Models' => $Models,
            'Reseaux' => $Reseaux,
            'SourceMiseAjours' => $SourceMiseAjours,
            'Users' => $user,
            'groups' => $groups
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
        glpi_computers::create([
            'nom'=>$request->nom,
            'locations_id'=>$request->locations_id,
            'users_id_tech'=>$request->users_id_tech,
            'UsagerNumero'=>$request->UsagerNumero,
            'Usager'=>$request->Usager,
            'Utilisateur'=>$request->Utilisateur,
            'groups_id'=>$request->groups_id,
            'users_id'=>$request->users_id,
            'uuid'=>$request->uuid,
            'autoupdatesystems_id'=>$request->autoupdatesystems_id,
            'states_id'=>$request->states_id,
            'computertypes_id'=>$request->computertypes_id,
            'fabricant_id'=>$request->fabricant_id,
            'computermodels_id'=>$request->computermodels_id,
            'numeroDeSerie'=>$request->numeroDeSerie,
            'NumeroDinventaire'=>$request->NumeroDinventaire,
            'networks_id'=>$request->networks_id,
            'comment'=>$request->comment,
            ]);
        return redirect()->route('Computer.form')->with(['success' => '??l??ment ajout??']);
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
     * @param
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "GLPI-Ordinateurs --$id";
        $header = 'Ordinateur';
        $types = glpi_computertypes::all();
        $Fabricants = glpi_fabricant::all();
        $Models = glpi_computermodels::all();
        $Reseaux = glpi_reseaux::all();
        $SourceMiseAjours = glpi_SourceMiseAjour::all();
        $user = User::all();
        $groups =glpi_groups::all();
        $Location = glpi_location::all();
        $Computer = glpi_computers::find($id);
        return view('front.edit.ComputerEdit')->with([
            'title' => $title,
            'header' => $header,
            'Types' => $types,
            'Fabricants' => $Fabricants,
            'Models' => $Models,
            'Reseaux' => $Reseaux,
            'SourceMiseAjours' => $SourceMiseAjours,
            'Users' => $user,
            'groups' => $groups,
            'Locations' => $Location,
            'Computer' => $Computer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Computer = glpi_computers::find($id);
        $Computer->update($request->all());
      return redirect()->route('front.computer')->with(['success' => '??l??ment modifi??']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Computer =  glpi_computers::where('id', $id)->delete();
        return redirect()->route('front.computer')->with(['success' => '??l??ment Supprimer']);
    }
}
