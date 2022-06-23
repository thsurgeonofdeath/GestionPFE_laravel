@extends('Etudiant/EtudiantMaster')
@section('content')
@php
use App\Models\User; 
use APP\Models\Filiere;
@endphp
<div class="container">
    <div class="row">
        <h2 class="text-center" style="color: #032c6a; font-weight: bold ;">  Titre du sujet:  {{$sujet->titre}}</h2> 
    </div>
 <div > <h3>description de sujet:</h3> <p>{{ $sujet->description}}</p> </div>
<div > <h3>Type de sujet:</h3> <p>{{ $sujet->Type_sujet->intitule}}</p> </div>

<div ><h3>Encadrant:</h3> <p>professeur {{$sujet->Encadrant->name}} <p></div>
        <div> 
            <h3>Liste des étudiants participants au projet:</h3>
        </div>
        <table class="table">
            <tr> 
                <td>
                     Etudiant
                </td>
                <td>
                    CNE
               </td>
               <td>
                     Niveau
                </td>
                <td>
                    Promotion
                </td>
                 <td>
                     Filiere
                </td>
            </tr>
@foreach ($sujet->etudiants as $Etudiant)
    <tr>
        <td class="blockquote-footer"> {{ User::find($Etudiant->id)->name}} </td>
        <td class="blockquote-footer"> {{ $Etudiant->cne}} </td>
        <td class="blockquote-footer"> @if ($Etudiant->niveau==1)
            1 iere année CI
        @elseif($Etudiant->niveau==2)
        2 ieme année CI
        @elseif($Etudiant->niveau==3)
        3 ieme année CI
        @elseif($Etudiant->niveau==4)
        1 iere année MASTER
        @elseif($Etudiant->niveau==5)
        2 ieme année MASTER
        @endif
         </td>
        <td class="blockquote-footer"> {{ $Etudiant->promotion}} </td>
        <td class="blockquote-footer"> {{$Etudiant->Filiere->intitule}} </td>
    </tr>
        @endforeach
        </table>

    
<h3> rapprt de stage: </h3>
<iframe src="{{asset('/storage/uploads/'.$sujet->raport)}}" class="responsive-iframe"></iframe>
@foreach ($sujet->etudiants as $Etudiant)
        @if (Auth::user()==User::find($Etudiant->id) )
        <div class="alert alert-success" role="alert">
        <h4>Voulez-vous modifier le rapport?</h4>
        <form action="{{ route('detailSujet.upload',$sujet->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <br>
            <div class="">
                <h3>Fichier PDF</h3>
                <input type="file" name="rapport" id="rapport" required="required"  >
                <h3>Résumé</h3>
                <textarea name="resume" id="resume" cols="100" rows="10" required="required">{!! $sujet->resume !!}</textarea>
                <h3>Mots-clés</h3>
                <input type="text" name="mot_cle" style="width: 101ex; display: block; margin-bottom: 10px;" required="required" value="{!! $sujet->mot_cle !!}">
               
            <input type="submit" value="Modifier le rapport" style="color: black">
            </div>
        </form> 
    </div>   
     @endif
     @endforeach
@endsection
<style>
    .container {
    justify-content: center;
    align-items: center;
    }
    .responsive-iframe {
    width: 100%;
    height: 70%;

    }


</style>