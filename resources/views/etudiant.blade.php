

 <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
@extends('Etudiant/EtudiantMaster')
@section('add')
         <a href="{{route('etudiant.addsujet')}}"><i class="fas fa-eye"></i> add sujet</a>    
@endsection
@section('content')
@php
use App\Models\User; 

@endphp
<h2 class="text-center" style="color: #032c6a; font-weight: bold ;">ESPACE  ÉTUDIANT</h2>

<div  class="row" style="margin: 0 30% ">
                          <form class="navbar-form navbar-left" action="{{route('filterEt')}}" method="post">
                            @csrf
                           
                          <select  class="form-control"  name="year" aria-label="Default select example"   onchange="this.form.submit();" >
              
                            <option  @if (isset($selectedt))
                            @if($selectedy==2021)
                              selected
              
                            @endif
                            @endif value="2021">2021 </option>
                            <<option  @if (isset($selectedt))
                            @if($selectedy==2022)
                              selected
              
                            @endif
                            @endif value="2022">2022 </option>
                            <option  @if (isset($selectedt))
                            @if($selectedy==2023)
                              selected
              
                            @endif
                            @endif value="2023">2023 </option>
                            <option  @if (isset($selectedt))
                            @if($selectedy==2024)
                              selected
              
                            @endif
                            @endif value="2024">2024 </option>
                            <option  @if (isset($selectedt))
                            @if($selectedy==2025)
                              selected
              
                            @endif
                            @endif value="2025">2025 </option>

                          </select>
                          <select  class="form-control"   name="type" aria-label="Default select example" onchange="this.form.submit();" >
                           
                            @foreach ($types as $types)
                                  
                            <option
                            @if (isset($selectedt))
                            @if($types->id==$selectedt)
                              selected
              
                            @endif
                            @endif
                             value="{{$types->id}}" >{{$types->intitule}}</option>
                            @endforeach

                          </select>
                          <select  class="form-control"  name="filiere" aria-label="Default select example" onchange="this.form.submit();" style="max-width: 170px;"  >
                           
                            @foreach ($filiere as $filiere)
                                  <option 
                                  @if (isset($selectedf))
                                      @if($filiere->id==$selectedf)
                                        selected
                        
                                      @endif
                                  @endif
                                  
                                  value="{{$filiere->id}}">{{$filiere->intitule}}</option>
                            @endforeach

                             </select>
                          </form>
                         
                     

      
                        {{-- dropdown --}}

    
</div>
@if (isset($sujets))
    <div class="py-5">
  <div class="container">
    <div class="row hidden-md-up">
      @foreach ($sujets as $sujet)
          <div class="col-md-6" style="margin-top: 3em;">
            <div class="card bg-primary ">
              <div class=" bg-success-block">
                <img class="img-fluid img-thumbnail" src="{{asset('/images/student.jpg')}}" alt="salam" >
                <h2 class=" bg-success-title bg-primary text-white "> title:{{$sujet->titre}}</h2>
                <h2 class=" bg-success-title bg-primary text-white "> ancadrant name:{{$sujet->encadrant->name}}</h2>
                <h2 class=" bg-success-title bg-primary text-white "> type:{{$sujet->Type_sujet->intitule}}</h2>
                <h2 class=" bg-success-title bg-primary text-white "> filiere:{{$sujet->etudiants->first()->filiere->intitule}}</h2>   
                <h2 class=" bg-success-title bg-primary text-white "> année: {{date('Y', strtotime($sujet->created_at))}}</h2>   
                <a href="{{route('detailSujet',$sujet->id)}}" class=" bg-success-link btn btn-success">details</a>
              </div>
            </div>
          </div>
      @endforeach
 
    </div> 
  </div>
</div>
@endif



@endsection

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>