
@extends('Encadrant/EncadrantMaster')
@section('contentE')

@php
use App\Models\User; 
use APP\Models\Filiere;

@endphp

<h1 style="color: navy; text-align: center;"> Insérez les champs suivants pour ajouter un nouveau <b><u>SUJET</u></b> :</h1>
 <form action="{{  route('storeModification',$sujet->id) }}" method="post" enctype="multipart/form-data">
    @if ($errors->any())
    <div class="alert alert-danger" style="text-align: center">
        <h5>
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </h5>
    </div>
@endif
    {{ csrf_field() }}   
    <div class="container mt-4">
        <h3>Titre</h3>
        <input class="form-control " type="text"  name="titre" id="titre" value="{{$sujet->titre}}">
    
        <h3>Description</h3>
      
        <textarea  class="form-control" style="min-height:  150px; " name="description" id="description">{!!$sujet->description!!}</textarea>
   
          <h3 for="validationTooltip03"> Type de sujet</h3>
          <select  class="form-control formselect required" name="type_sujet_id" id="type_sujet_id" aria-label="Default select example"  >
            <option selected>Choisir un Type de sujet</option>
      
            @foreach ($types as $types)
                  @if ($sujet->type_sujet_id==$types->id)
                  <option value="{{$types->id}}" selected>{{$types->intitule}}</option>

                  @else
                  <option value="{{$types->id}}">{{$types->intitule}}</option>

                  @endif
            @endforeach
      
          </select>
          <h3>Date Limite</h3>
          <input class="form-control " type="date"  name="limite" id="limite" value="{{$sujet->date_limite}}">
                   {{--
          <h3>Niveau</h3>
        <select class="form-control formselect required"  name="niveau" id="niveau" aria-label="Default select example"    >
            <option selected> 
            @if ($sujet->niveau==1)
            1 iere année CI
        @elseif($sujet->niveau==2)
        2 ieme année CI
        @elseif($sujet->niveau==3)
        3 ieme année CI
        @elseif($sujet->niveau==4)
        1 iere année MASTER
        @elseif($sujet->niveau==5)
        2 ieme année MASTER
        @endif
        </option>
            <option value="1">1 iere année CI </option>
            <option value="2">2 ième année CI </option>
            <option value="3">3 ième année CI</option>
            <option value="4">1 iere année MASTER</option>
            <option value="5">2 ieme année MASTER</option>
      
          </select>
        --}} 
          <div style="margin-top: 30px;" >

            <input class="form-control btn btn-primary "  type="submit" value="valider" >
          </div>

</form> 


@endsection
