<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">



    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css" rel="stylesheet">
       <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
   	<link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
   	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Contact</title>
    <link rel = "icon" href = "{{url('images/','logos.jpeg') }}" type = "image/x-icon">

</head>
<body style="  background: url('images/bg.jpeg');">
    
    <nav class="navbar navbar-expand-lg navbar-light  " style="margin-top: 20px; margin-left: 120px;">
        <a class="navbar-brand" href="/"> <img src="{{url('images/','logos.jpeg') }}" style=" margin-top :-15px;  width: 50px; border-radius: 20px;"  >
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
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
            <li class="nav-item">
                <a href="{{route('aboutus')}}" class="nav-link">About Us</a>
            </li>
            <li class="nav-item active">
                <a href="{{route('contact')}}" class="nav-link">Contact</a>
            </li>
 
          </ul>
         
        </div>
      </nav>

  

<section id="contact">
			<div class="section-content">
				<h1 class="section-header">Contactez-nous </h1>
				<h3>Saisissez vos information et votre message.</h3>
			</div>
			<div class="contact-section">
			<div class="container">
				<form action="{{route('sendMsg')}}" method="POST">
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
					<div class="col-md-6 form-line">
			  			<div class="form-group">
			  				<label for="exampleInputUsername">Nom</label>
					    	<input type="text" class="form-control" id="name" name="name" placeholder=" Entrez le Nom" required>
				  		</div>
				  		<div class="form-group">
					    	<label for="exampleInputEmail">Email </label>
					    	<input type="email" class="form-control" id="exampleInputEmail" name="email" placeholder=" Entrez l'Email " required>
					  	</div>	
					  	<div class="form-group">
					    	<label for="telephone">No. Tel</label>
					    	<input type="tel" class="form-control" id="telephone" name="tel" placeholder=" Entrez votre no. de tel" required>
			  			</div>
			  		</div>
			  		<div class="col-md-6">
			  			<div class="form-group">
			  				<label for ="description"> Message</label>
			  			 	<textarea  class="form-control" id="description" name="message" placeholder="Entrez votre Message" required></textarea>
			  			</div>
			  			<div>

			  				<button type="submit" class="btn btn-default submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Envoyer Message</button>
			  			</div>
			  			
					</div>
				</form>
			</div>
</section>
    </body>
    </html>
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