@extends('Etudiant/EtudiantMaster')
@section('content')
@php
use App\Models\User; 
@endphp
<form action="{{ route('modifierInfo') }} " method="post" enctype="multipart/form-data">
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
        <h3>Nom et Prénom:</h3>
        <input class="form-control " type="text"  name="name" id="name" placeholder="Nom et Prénom" value="{{Auth::user()->name}} ">
    
       
   
        <div class="form-group">
            <h3 for="exampleInputEmail1">Addresse Email :</h3>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{Auth::user()->email}} ">
          </div>
          
          <div class="form-group">
            <h3 for="exampleInputPassword1">Mot de Passe :</h3>
            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de Passe"  >
          </div>
          <div class="form-group">
            <h3 for="exampleInputEmail1">Confirmer mot de passe :</h3>
            <input type="password"  name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirmer mot de passe">

        </div>
          
         
          <button type="submit"  class="btn btn-primary btn-lg btn-block">Enregistrer</button>
</form>
@endsection