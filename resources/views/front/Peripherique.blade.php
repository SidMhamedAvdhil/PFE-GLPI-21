@extends('layouts.app')
@section('content')
<main id="page">
       <h4 class="alert-heading alert text-white">
              <a class="text-white aa" href="{{route('home')}}">Accueil</a> >
              <a class="text-white aa" href="{{route('Peripherique.index')}}">{{$header}}</a>
       </h4>
    <div>
        <table class="tab_cadre_pager">
            <tbody>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>
            </tbody>
        </table>
    </div>
    <form action="#" method="post" name="massformComputer" id="massformComputer">
            <table class="tab_glpi" width="95%">
                <tbody>
                    <tr class="">
                        <td width="30px">
                            <img src="/images/arrow-left-top.png" alt="" srcset="">
                        </td>
                        <td class="left" width="100%">
                           <a class="vsubmit" onclick="massiveaction_windowe59f855a9415b6a820471339573d9573.dialog("open");" title="Actions" href="">Actions</a>
                        </td>
                        <td class="left" width="100%">
                            <a href="{{route('FormAjouterPeripherique')}}" class="btn btn-success px-2 py-0">
                              <i class="fa fa-plus-circle" title="Ajouter"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>

        <div class="center">
             <table class="tab_cadrehov" border="0">
                 <thead>
                   <tr class="bg-white">
                     <th class="">
                         <div class="form-group-checkbox">
                            <input id="checkbox" type="checkbox" class="new_checkbox" name="checkbox" onclick="if ( checkAsCheckboxes('checkbox', 'massformComputer'))
                            {return true;}" title="Tout cocher Comme">
                            <label for="checkbox" title="Tout cocher comme" class="label-checkbox">
                               <span class="check"></span>
                               <span class="box"></span>
                            </label>
                         </div>
                     </th>
                     <th><a href="#">Nom</a></th>
                     <th><a href="#">Statut</a></th>
                     <th><a href="#">Fabricant</a></th>
                     <th><a href="#">Lieu</a></th>
                     <th><a href="#">Type</a></th>
                     <th><a href="#">Mod??le</a></th>
                     <th><a href="#">Derni??re modification</a></th>
                     <th><a href="#">Usager</a></th>
                    </tr>
                 </thead>
                 <tbody>
                     @foreach ($Peripheriques as $Peripherique)
                     <tr>
                        <td width="10px" valign="top">
                            <span class="form-group-checkbox">
                                <input id="check_1515325751"  value="1" type="checkbox" class="new_checkbox" data-glpicore-ma-tags="common" name="checkbox" onclick="if ( checkAsCheckboxes('checkbox', 'massformComputer'))
                                {return true;}" title="Tout cocher Comme">
                                <label for="checkbox" title="Tout cocher comme" class="label-checkbox">
                                   <span class="check"></span>
                                   <span class="box"></span>
                                </label>
                            </span>
                        </td>
                        <td><a href="{{route('Peripherique.edit',$Peripherique->id)}}">{{ $Peripherique->name }}</a></td>
                        <td>{{ $Peripherique->statut_id }}</td>
                        <td>{{ App\Models\glpi_fabricant::findOrFail($Peripherique->fabricant_id)->Nom }}</td>
                        <td>{{ App\Models\glpi_location::findOrFail($Peripherique->locations_id)->Nom }}</td>
                        <td>{{ App\Models\TypesPeripherique::findOrFail($Peripherique->Peripheriquetypes_id)->name }}</td>
                        <td>{{ App\Models\ModelPeripherique::findOrFail($Peripherique->Peripheriquemodels_id)->name }}</td>
                        <td>{{$Peripherique->updated_at}}</td>
                        <td>{{$Peripherique->Usager}}</td>
                    </tr>
                     @endforeach
                     <tr class="bg-white">
                        <th class="">
                            <div class="form-group-checkbox">
                               <input id="checkbox" type="checkbox" class="new_checkbox" name="checkbox" onclick="if ( checkAsCheckboxes('checkbox', 'massformComputer'))
                               {return true;}" title="Tout cocher Comme">
                               <label for="checkbox" title="Tout cocher comme" class="label-checkbox">
                                  <span class="check"></span>
                                  <span class="box"></span>
                               </label>
                            </div>
                        </th>
                        <th><a href="#">Nom</a></th>
                        <th><a href="#">Statut</a></th>
                        <th><a href="#">Fabricant</a></th>
                        <th><a href="#">Lieu</a></th>
                        <th><a href="#">Type</a></th>
                        <th><a href="#">Mod??le</a></th>
                        <th><a href="#">Derni??re modification</a></th>
                        <th><a href="#">Usager</a></th>
                       </tr>
                 </tbody>
             </table>
        </div>
        <table class="tab_glpi" width="95%">
            <tbody>
                <tr class="">
                    <td width="30px">
                        <img src="/images/arrow-left.png" alt="" srcset="">
                    </td>
                    <td class="left" width="100%">
                       <a class="vsubmit" onclick="massiveaction_windowe59f855a9415b6a820471339573d9573.dialog("open");" title="Actions" href="">Actions</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    </main>
@endsection
