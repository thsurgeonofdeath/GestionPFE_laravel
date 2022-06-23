{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in as encadrant!
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}


 <link rel="stylesheet" href="{{ asset('./stye.css') }}">
 <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
@extends('Encadrant/EncadrantMaster')
@section('contentE')
@php
use App\Models\User; 

@endphp
@if (session('success'))
<div class="alert alert-success" style="text-align: center">
    <ul>
        <h5>{{session('success') }}</h5>
    </ul>
</div>
@endif
<h2 class="text-center" style="color: #032c6a; font-weight: bold ;"> ESPACE  ENCADRANT</h2>
<div  class="row" style="margin: 0 30% ;">
        
    {{-- dropdown promo
    <select  class="form-control"  name="promo" aria-label="Default select example" >
      <option value="1">2014</option>
      <option value="2">2015</option>
      <option value="3">2016</option>
      <option value="4">2017</option>
      <option value="5">2018</option>
      <option value="6">2019</option>
      <option value="7">2020</option>
      <option value="8">2021</option>


    </select>

    dropdown --}}
    {{-- dropdown niveau--}}
    <form class="navbar-form navbar-left" action="/filtreNiveauE" method="GET" >

    <select  class="form-control"  name="niveau" aria-label="Default select example"   onchange="this.form.submit();" >
      <option selected>Niveau </option>

      <option value="1">1 iere année CI </option>
      <option value="2">2 ième année CI </option>
      <option value="3">3 ième année CI</option>
      <option value="4">1 iere année MASTER</option>
      <option value="5">2 ième année MASTER</option>

    </select>
    </form>
    {{-- dropdown --}}
    {{-- dropdown niveau--}}
    <form class="navbar-form navbar-left" action="/filtreTypeE" method="GET">

    <select  class="form-control"  name="type" aria-label="Default select example" onchange="this.form.submit();" >
      <option selected>Type de sujet</option>

      @foreach ($types as $types)
            
      <option value="{{$types->id}}">{{$types->intitule}}</option>
      @endforeach

    </select>
    </form>
    {{-- dropdown --}}
    {{-- dropdown filiere--}}
    <form class="navbar-form " action="/filtreFiliereE" method="GET">
      
    <select  class="form-control "  name="filiere" aria-label="Default select example" onchange="this.form.submit();" style="max-width: 170px;"  >
      <option selected>Filières</option>

      @foreach ($filiere as $filiere)
          
    <option value="{{$filiere->id}}">{{$filiere->intitule}}</option>
    @endforeach

  </select>
</form>


<form action="/cherche" method="GET" >

  <div class="form-group">
  <input type="text" class="form-control" name="query" placeholder="Rechercher Un Prof" required>
</div>
<div>
  <button type="submit" class="btn pull-center"> Rechercher </button>
</div>

  
</form>
  {{-- dropdown --}}


</div >
<div style="  padding-bottom: 20px;">
@foreach ($sujet as $sujet)

<div class="container"  >
    <h2 class="title">        <a href={{ route('detailSujetE', ['id'=>$sujet->id]) }}>{{$sujet->titre}} </a></h2>
    <div class="time">Type de sujet: {{ $sujet->Type_sujet->intitule}}</div>
    <br>
    <div class="note">
      @if ($sujet->resume==null)
      <div style="color: #2b71db; font-weight: bold;">Description:</div>

      <p>  {{$sujet->description}} </p>
      @else
      <div style="color: #2b71db; font-weight: bold;">Résumé:</div>

      <p>  {{$sujet->resume}} </p>
      @endif
      
         <div style="color: #2b71db; font-weight: bold;"> Encadrant:</div>

       
        <p class="note__text"><img src="{{ asset('./puce_img.PNG') }}" alt="" class="puce">    {{$sujet->Encadrant->name}} </p>
        <div style="color: #2b71db; font-weight: bold;"> Etudiants:</div>

        
             @foreach ($sujet->Etudiant as $Etudiant)

        <p class="note__text"><img src="{{ asset('./puce_img.PNG') }}" alt="" class="puce"> {{ User::find($Etudiant->etudiant_id)->name}}  </p>
            @endforeach
            <div style="display: inline-block;">
              @if ($sujet->mot_cle!=null)
              <div style="color: #2b71db; font-weight: bold;"> Mots-Clés:</div>
              <p class="note__text"> {{ $sujet->mot_cle}}  </p>
              @endif
            </div>
              <div style=" display: inline-block; margin-left: 110ex;">
                @foreach ($sujet->Etudiant as $Etudiant)
                <div style="color: #2b71db; font-weight: bold;"> Promotion:</div>
                <p class="note__text"> {{ $Etudiant->promotion}}  </p>
                @break
      
              @endforeach
              </div>
    </div>
    
</div>
@endforeach
</div>
@endsection

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>


