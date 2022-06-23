{{-- <label class="label">etudiant</label>
<div class="select is-multiple">
    <select name="etudiant[]" multiple>
        @foreach($Etudiant as $Etudiant)
            <option value="{{ $Etudiant->id }}" {{ in_array($Etudiant->id, old('etudiant') ?: []) ? 'selected' : '' }}>{{ $etudiant->name }}</option>
        @endforeach
    </select>
</div> --}}
@extends('Etudiant/EtudiantMaster')
@section('content')
@php
use App\Models\User; 
use APP\Models\Filiere;
use APP\Models\Etudiant;

@endphp
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
--}}
<h1 style="color: navy; text-align: center;"> Insérez les champs suivants pour ajouter un nouveau <b><u>SUJET</u></b> :</h1>
 <form action="{{  route('storeSujet') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}   
    @if (session('success'))
    <div class="alert alert-success" style="text-align: center">
        <ul>
            <h5>{{session('success') }}</h5>
        </ul>
    </div>
   @endif
    

   @if ($errors->any())
    <div class="alert alert-danger" style="text-align: center">
        <h5>
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </h5>
    </div>
  @endif
    <div class="container mt-4">
        <h3>Titre</h3>
        <input class="form-control " type="text"  name="titre" id="titre">
        <h3>Description</h3>
        <textarea  class="form-control " name="description" id="description"></textarea>

    
            <label for="upload_file" class="control-label "> <h3> rapport fomat pdf</h3></label>
            <div class="form-group">
                 <input class="form-control" type="file" name="raport" id="raport">
            </div>
       
            <h3>Encadrant<span class="gcolor"></span> </h3>
            <div class="form-s2">
                <div>
                    <select class="form-control  required "     name="encadrant">
                        @foreach ($encadrants as $encadrant)
                        <option value="{{$encadrant->id}}">{{$encadrant->user->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
      

        <h3>Entreprise</h3>
      
        <input  class="form-control " type="text" name="entreprise" id="entreprise"></input>
        <h3>Contact Entreprise</h3>
       <h4> Numero de telephone:</h4>
<input class="form-control" type="tel" id="phone" name="phone"
       
       required placeholder="Exemple: 0610101010">
       <h4> Adresse Email:</h4>
        <input  class="form-control " type="email" name="email" id="email"></input>
   
          <h3 for="validationTooltip03"> Type de sujet</h3>
          <select  class="form-control formselect required" name="type_sujet_id" id="type_sujet_id" aria-label="Default select example" name="type" >
            <option selected>Choisir un Type de sujet</option>
      
            @foreach ($types as $types)
                  
            <option value="{{$types->id}}">{{$types->intitule}}</option>
            @endforeach
      
          </select>       
            <div class="row">
                <div class="col-md-4">
                <h3>Niveau</h3>
        <select class="form-control form select required"  name="niveau" id="niveau" aria-label="Default select example"    >
            <option selected>Choisir Niveau </option>    
            <option value="3">1 iere année CI </option>
            <option value="4">2 ième année CI </option>
            <option value="5">3 ième année CI</option>
          </select>
            </div>    
                <div class="col-md-12">
                    <h3>Etudiants</h3>
                    <select class="form-control  required select" id="select"  multiple aria-label="multiple select example"  name="etudiants[]">
                        @foreach ($etudiants as $etudiant)
                        @if ($etudiant->id!=Auth::user()->etudiant->id)
                        <option value="{{$etudiant->id}}">{{$etudiant->user->name}}</option>
                        @endif
                        
                        @endforeach
                    </select>
                </div>
            </div>
            <div style="margin-top: 30px;" >
              <input class="form-control btn btn-primary "  type="submit" value="valider" >
            </div>

    </form> 
@endsection
 @section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix-core.js" integrity="sha512-H8CbNdhcOBCt62S6eVGAUSiyNx5OGVEVrYIIVs0iIgurgD1+oTA9THTZ1tqxSE9yw9vzfilg83xgyxD467a28g==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        
    $('.select').select2();
    })
</script>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"  />

@endsection

   