<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
 
        <title >Accueil</title>
 
        <link rel = "icon" href = "{{url('images/','logos.jpeg') }}" type = "image/x-icon">
         <!-- Fonts -->
        {{--
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
 
        --}}
         {{--         <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
         
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
       
 
         <!-- Styles -->
       
 
         <link rel="stylesheet" href="styleNav.css">
 
    </head>
    <body style=" background: url({{asset('images/bg.jpeg')}});">
        <nav class="navbar navbar-expand-lg navbar-light  " style="margin-top: -20px;">
            <a class="navbar-brand" href="{{route('welcome')}}"> <img src="{{url('images/','logos.jpeg') }}" style=" margin-top :-15px;  width: 50px; border-radius: 20px;"  >
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
                            <a href="{{route('Admin') }}" class="dropdown-item">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="dropdown-item">Espace Etudiants</a>
                             <a href="{{ route('loginE') }}" class="dropdown-item">Espace Encadrants</a>
                        
                           
                        
            
                            <a href="{{ route('loginA') }}" class="dropdown-item">Espace Admins</a>
                        
            
                        @endauth
                   
                         @endif
                        
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('register')}}" class="nav-link">Register</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('aboutus')}}" class="nav-link">About Us</a>
                  </li>
                <li class="nav-item">
                    <a href="{{route('contact')}}" class="nav-link">Contact</a>
                </li>
                
                {{----------------------------------------------------
                @if (Route::has('login'))
                @auth
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                </li >
                @else
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">Espace Etudiants</a>
                </li>
    
                    @if (Route::has('loginE'))
                <li class="nav-item">
                     <a href="{{ route('loginE') }}" class="nav-link">Espace Encadrants</a>
                </li>
                    @endif
                <li class="nav-item">
    
                    <a href="" class="nav-link">Espace Admins</a>
                </li>
    
                @endauth
           
                 @endif
                --}}
              </ul>
             
            </div>
          </nav>
                @yield('contentWelcome')

     
 
    </body>
</html>
