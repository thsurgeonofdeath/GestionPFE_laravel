@extends('Encadrant\EncadrantMaster')
@php    
use App\Models\User;
use App\Models\filiere;
use App\Models\Etudiant;
@endphp


@section('contentE')

 <section id="contact">
    <div class="section-content">
        <h1 class="section-header"> Création d'un PV </h1>
    </div>
    <div class="contact-section">
    <div class="container">
        <form action="{{route('sendpv')}}" method="POST">
            {{ csrf_field() }}   

            @if (session('success'))
            <div class="alert alert-success" style="text-align: center; ">
                <ul>
                    <h4>{{session('success') }}</h4>
                </ul>
            </div>
         @endif
            
        
         @if ($errors->any())
            <div class="alert alert-danger" style="text-align: center;">
                <h4>
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </h4>
            </div>
         @endif
            
                  <div class="form-group">
                      <label>Date de la réunion</label>
                    <input type="date" class="form-control" name="date"  required>
                  </div>
                  <div class="form-group">
                    <label> Sujet </label>
                    <select class="form-control"  name="sujet"  required>
                        <option selected> -- </option>
                        @foreach ($sujets as $sujet)
                        <option value="{{$sujet->titre}}">{{$sujet->titre}}</option>    
                        @endforeach
                    </select>
                  </div>	
                  <div class="form-group">
                    <label> Encadrant Superviseur </label>
                    <select class="form-control"  name="superviseur"  required>
                        <option selected> -- </option>
                        @foreach ($data as $data)
                        <option value="{{$data->name}}">{{$data->name}}</option>    
                        @endforeach
                    </select>
                  </div>	
                  	
                  <div class="form-group">
                    <label>Décision</label>
                  <select class="form-control" name="note"  required>
                      <option selected> -- </option>
                      <option value="Projet Validé"> Validé </option>
                      <option value="Projet Non Validé"> Non Validé </option>
                  </select>
                </div>
                  <div>

                      <button type="submit" class="btn pull-center"> Enregistrer PV </button>
                  </div>
              </div>
           
            </div>
 </section>
</form>
<style>
.nav-item{
font-size: 20px;
font-weight: bold;
margin-left: 50px;
color: black;
list-style: none;
    
    }
    .content-header{
font-family: 'Oleo Script', cursive;
color:#fcc500;
font-size: 45px;
}

.section-content{
text-align: center; 

}
.mul-select{
            width: 100%;
        }

#contact{

font-family: 'Teko', sans-serif;
padding-top: 60px;
width: 100%;
width: 100vw;
height: 550px;

}
.contact-section{
padding-top: 40px;
}
.contact-section .col-md-6{
width: 50%;
}

.form-line{
border-right: 1px solid #B29999;
}

.form-group{
margin-top: 10px;
}
label{
font-size: 1.3em;
line-height: 1em;
font-weight: normal;
}
.form-control{
font-size: 1.3em;
color: #080808;
}
textarea.form-control {
height: 135px;
/* margin-top: px;*/
}

.submit{
background-color: rgb(154, 154, 223);
font-size: 1.1em;
width:100px;
}

</style>

@endsection