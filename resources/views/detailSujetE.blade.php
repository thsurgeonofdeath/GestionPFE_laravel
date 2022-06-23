@extends('Encadrant/EncadrantMaster')
@section('contentE')
@php
use App\Models\User; 
use APP\Models\Filiere;
@endphp
<div class="container">
    <div class="row">
        <h2 class="text-center" style="color: #032c6a; font-weight: bold ;">  Titre du sujet:  {{$sujet->titre}}</h2>
       
    </div>
    <div >
<h3>Description du sujet: </h3>
<textarea  class="form-control" style="min-height:  150px; background-color: transparent; border: none; height:auto;  " name="description" id="description" readonly>{!!$sujet->description!!}</textarea>

<p >

   {{--{!!$sujet->description!!}--}}
</p>
</div>
<div > <h3>Type de sujet:</h3> <p>{{ $sujet->Type_sujet->intitule}}</p> </div>

<div ><h3>Encadrant:</h3> <p>professeur {{$sujet->Encadrant->name}} <p></div>
        <div> <h3>Liste des étudiants participants au projet:</h3></div>
        <table class="table">
            <tr> <td>
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
        @foreach ($sujet->Etudiant as $Etudiant)
    <tr>
        <td class="blockquote-footer"> {{ User::find($Etudiant->etudiant_id)->name}} </td>
        <td class="blockquote-footer"> {{ $Etudiant->cne}} </td>
        <td class="blockquote-footer">
         @if ($Etudiant->niveau==1)
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

        <h3>Date Limite</h3>
    <input class="form-control " type="date"  name="limite" id="limite" value="{{$sujet->date_limite}}" readonly="readonly" style="background-color: transparent; border: none;"><br>
    
        @if ($sujet->validation==null && $sujet->rapport!=null)
        <form class="" action="{{ route('valider', $sujet->id) }}" method="post" style="text-align: center">
            @csrf

            <div class="alert alert-danger">
                <h3 >voulez vous valider ce travail? </h3>
        
                <label class="radio-inline">
                    <input type="radio" name="validation" value="1" class="required" >
                    Travail validé
                </label>
                <label class="radio-inline">
                    <input type="radio" name="validation" value="2" class="required" >
                    Travail non validé
        
                </label>
            
                <input type="submit" class="btn btn-danger btn-lg btn-block" value="enregister">
        
              </div>
            </form>
        @else
        <h3>Validation:</h3>  

                @if ($sujet->validation==1)
                <p >
                 Ce travail est validé
                </p>
                @elseif($sujet->validation==2)
                <p >
                Ce travail n'est pas validé
                </p>
                @elseif($sujet->validation==null)
                <p >
                Ce travail n'est pas encore validé
                </p> 
                 @endif
        @endif


@if ($sujet->rapport!=null)
<h3> Nom du fichier: {{ $sujet->rapport}} </h3>
<iframe src="{{url('pdf/',$sujet->rapport) }}" class="responsive-iframe"></iframe>

@endif     
    

<div><br><br></div>
@if (Auth::user()==User::find($sujet->encadrant_id))
    <div class="alert alert-info" role="alert">
    <h4 style="text-align: center" >Voulez-vous modifier ce sujet?</h4>

    <div class="btn btn-primary btn-lg btn-block" ><a href="{{ route('modifier', $sujet->id) }}" style="color: white">Modifier</a></div>
    
</div> 
<div class="alert alert-danger" role="alert">

<h4 style="text-align: center" >Voulez-vous supprimer ce sujet?</h4>

    <div class="btn btn-danger btn-lg btn-block" ><a onclick="return confirm('Êtes-vous sure de vouloir supprimer ce sujet?')" href="{{ route('supprimerSujet', $sujet->id) }}" style="color: white">Supprimer</a></div>
</div> 

         @endif
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
