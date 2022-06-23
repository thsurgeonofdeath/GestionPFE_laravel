   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

<nav class="navbar navbar-default">
    
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand " href=""{{ route('etudiant') }}""> 
         
   
            <img src="{{url('images/','logos.jpeg') }}" style=" margin-top :-15px; 50px; width: 50px; border-radius: 20px;"  >
        </a>
      </div>
  
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li
          @if(Route::currentRouteName()=='etudiant' || Route::currentRouteName()=='filterEt' || Route::currentRouteName()=='filter_type')
          class="bg-info"
          @endif
          ><a href="{{ route('etudiant') }}"><i class="fas fa-home"></i> Accueil</a></li>
          <li 
          @if(Route::currentRouteName()=='mes_sujets_valide')
          class="bg-info"
          @endif><a href="{{route('mes_sujets_valide',Auth::user()->id)}}"><i class="fas fa-eye"></i> mes sujets validée</a></li>
          <li 
          @if(Route::currentRouteName()=='mes_sujets_nonvalide')
          class="bg-info"
          @endif><a href="{{route('mes_sujets_nonvalide',Auth::user()->id)}}"><i class="fas fa-eye"></i> mes sujets non validée</a></li>
          <li>@yield('add')</li>
        </ul>


        <ul class="nav navbar-nav navbar-right">
                  {{-- search --}}
        
        <form class="navbar-form navbar-left" action="{{route('filter_titre')}}" method="POST">
          @csrf
          <div class="form-group">
            <input type="text" class="form-control" name="titre" placeholder="Search">
          </div>
                        
          <button type="submit" class="btn btn-default" ><i class="fas fa-search" ></i></button>
        </form>
       {{-- end search --}}
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
 <ul class="dropdown-menu">
  <form method="POST" action="{{ route('logout') }}"  >
               @csrf
<li  >

<a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="btn btn-light  btn-lg btn-block" style="font-size: 15px;"    >
  <span>
  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
    <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
  </svg>  
  </span><span>  Logout</span>
</a>
</li>
 </form>
 
              
              <li role="separator" class="divider"></li>
              <li><a href="{{route('parametre') }} " style="text-align: center;" ><i class="fas fa-cog"> </i> Parametres</a></li>
</ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>