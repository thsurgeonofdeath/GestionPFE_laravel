<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
   	<link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
   	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>About Us</title>
    <link rel = "icon" href = "{{url('images/','logos.jpeg') }}" type = "image/x-icon">
    <link rel="stylesheet" href="styleNav.css">

</head>
<body style="  background: url('images/bg.jpeg');">
    
    <nav class="navbar navbar-expand-lg navbar-light  "  style="margin-top: 20px; margin-left: 120px;">
        <a class="navbar-brand" href="/"> <img src="{{url('images/','logos.jpeg') }}" style=" margin-top :-15px;  width: 50px; border-radius: 20px;"  >
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Authentification
              </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color: gray;">
                    @if (Route::has('login'))
                    @auth
                    
                        <a href="{{ url('/dashboard') }}" class="dropdown-item">Dashboard</a>
                  
                    @else
                    
                        <a href="{{ route('login') }}" class="dropdown-item">Espace Etudiants</a>
                   
        
                        @if (Route::has('loginE'))
                   
                         <a href="{{ route('loginE') }}" class="dropdown-item">Espace Encadrants</a>
                    
                        @endif
                    
        
                        <a href="" class="dropdown-item">Espace Admins</a>
                    
        
                    @endauth
               
                     @endif
                    
                </div>
              </li>
            <li class="nav-item">
                <a href="{{route('aboutus')}}" class="nav-link">About Us</a>
            </li>
            <li class="nav-item">
                <a href="{{route('contact')}}" class="nav-link">Contact</a>
            </li>
          </ul>
         
        </div>
      </nav>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 order-2 order-md-1 mt-4 pt-2 mt-sm-0 opt-sm-0">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-6">
                    <div class="row">
                        
                        <!--end col-->

                        <div class="col-12">
                            <div class="mt-4 pt-2 text-right">
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
                <!--end col-->

                <div class="col-lg-6 col-md-6 col-6" style="width: 1500px; height: auto;">
                    <div class="row">
                        <div class="col-lg-12 col-md-12" >
                            <div class="card work-desk rounded border-0 shadow-lg overflow-hidden">
                                <img src="{{url('images/','ensaf.jpg') }}"class="img-fluid" alt="Image"  />
                                <div class="img-overlay bg-dark"></div>
                            </div>
                        </div>
                        <!--end col-->

                        <div class="col-lg-12 col-md-12 mt-4 pt-2" >
                            <div class="card work-desk rounded border-0 shadow-lg overflow-hidden">
                                <img src="{{url('images/','usmba.jpg') }}" class="img-fluid" alt="Image"  />
                                <div class="img-overlay bg-dark"></div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end col-->

        <div class="col-lg-6 col-md-6 col-12 order-1 order-md-2">
            <div class="section-title ml-lg-5">
                <h1 class="" style="color: #032c6a">Concept de l'application.</h1>
                <h4 class="title mb-4">
                    <p>Cette application Web est une application de gestion des projets Académiques comme les PFA, les projets de stages, les PFE ... </p>

                </h4>
                <p class="text-muted mb-0">L'application aide les encadrants et les étudiants à voir tous les sujets qu'il sont déjà fait avec leurs informations et leurs rapports, et aide les encadrants a choisir et affecter des sujets à leurs étudiants. </p>
                <p class="text-muted mb-0">Depuis toujours, à l’école nationale des sciences appliquées de Fès, les élèves sont amenés à faire des projets académiques (des PFA, des PFE, des stages…), et l’opération de choix des sujets, la création des groupes de travail et l’affectation des encadrants et sujets aux étudiants se fait encore de manière manuelle et aléatoire. Ce qui fait que l’opération prend beaucoup de temps et n’est pas du tout pratique. 
                    En plus, les idées réalisées par les étudiants d’une promotion, ne sont plus améliorées et perfectionnées par les étudiants des promotions suivantes. Et ceci car ils ne savent pas ce qui s’est réalisé les années précédentes. 
                    En partant de cette problématique, nous avons décidé de créer une application Web de gestion des projets réalisés au sein de l’ENSA de Fès, pour aider l’administration à gérer l’opération de répartition des sujets et des encadrants aux étudiants et pour la gestion du processus de la réalisation du projet de A à Z.
                    Cette application va aussi aider les étudiants à avoir une idée sur les sujets traités par les autres promotions et pourquoi pas leurs donner une inspiration pour leurs prochains projets. Et peut-être ils peuvent prendre un sujet et l’améliorer ou bien le mettre à jour à une nouvelle version qui apporte de nouvelles fonctionnalités. Sans oublier qu’ils peuvent aussi réparer les erreurs ou combler des failles de sécurité si elles existent dans les anciennes applications.
                    Également, l’application aide les encadrants et les encadrantes dans le suivi du projet et les aident à valider les travaux effectués par leurs étudiants. Ainsi que l’ajout, la modification et la suppression des sujets avec la gestion des dates limites des projets.
                    </p>

                <div class="row">
                    <div class="col-lg-6 mt-4 pt-2" style="text-align: center">
                        <div class="media align-items-center rounded shadow p-3" style="background-color: white">
                           <i class="fas fa-home mb-0 text-custom"></i>
                            <h5 class="ml-3 mb-0"><a href="/" class="text-dark">Accueil</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4 pt-2" style="text-align: center">
                        <div class="media align-items-center rounded shadow p-3" style="background-color: white">
                            <i class="fas fa-sign-in-alt mb-0 text-custom"></i>
                            <h5 class="ml-3 mb-0"><a href="{{route('login')}}" class="text-dark">Espace Etudiants</a></h5>
                                          
   
   
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4 pt-2" style="text-align: center">
                        <div class="media align-items-center rounded shadow p-3" style="background-color: white">
                            <i class="fas fa-sign-in-alt mb-0 text-custom"></i>
                            <h5 class="ml-3 mb-0"><a href="{{route('loginE')}}" class="text-dark">Espace Encadrants</a></h5>
                                          
   
   
                        </div>
                        
                    </div>
                    <div class="col-lg-6 mt-4 pt-2" style="text-align: center">
                        <div class="media align-items-center rounded shadow p-3" style="background-color: white">
                            <i class="far fa-id-badge mb-0 text-custom" ></i>
                            <h5 class="ml-3 mb-0"><a href="{{route('contact')}}" class="text-dark">Contact</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--enr row-->
</div>
<style>
    body{
    margin-top:20px;
    background:#F0F8FF;
    }
    .text-custom{
    color: #0062ff !important;
    }
    .nav-item{
       font-size: 20px;
      font-weight: bold;
       margin-left: 50px;
      color: black;
     list-style: none;
            
            }
    
</style>

    </body>
    </html>
 <style>
            .content-header{
     font-family: 'Oleo Script', cursive;
    color:#fcc500;
    font-size: 45px;
        }

    .section-content{
    text-align: center; 

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
  font-size: 1.1em;
  float: right;
  width: 150px;
  background-color: rgb(208, 208, 209);

    }

</style>