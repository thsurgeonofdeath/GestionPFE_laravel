<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<x-guest-layout>
        <div class="sidenav">
            <div class="login-main-text">
               <!--h2> Espace Etudiants</h2-->
               <h2>
                   <a href="" style="font-weight: bold; color: white;" class="typewrite" data-period="2000" data-type='["Ecole Nationale des Sciences appliquées de Fès", "Bonjour cher Professeur",  " Connectez-vous à votre Espace par là." ]'>

                     <span class="wrap"></span>
                   </a>
                 </h2>
               <!--p>Login or register from here to access.</p-->
            </div>
         </div>
     <!--   <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>-->

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        
        <frame>
            <div style="background-image: url('{{ asset('image/bac.jpeg')}}');" class="main" >

               <div class="col-md-6 col-sm-12" style=" position: absolute; top: 105px; left: 700px;">
                  <div class="wrapper fadeInDown">
                      <div id="formContent">

                        <div class="fadeIn first">
                            <img src="./images/logos.jpeg" style="height: 100px; width: 100px; border-radius: 20px;margin-bottom: 10px;margin-left: 180px;"  >


                          <!--h1>Se Connecte </h1-->
                        </div>
   <h2 class="text-center" style="color: #032c6a; font-weight: bold ;">CONNEXION A L'ESPACE  ENCADRANTS</h2>

        <form method="POST" action="{{ route('loginE') }}">
            @csrf
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" style="font-size: 15px;"/>

                <x-input style="width: 300px; height: 30px; margin: 0 auto; font-size: 15px;" id="email" class="fadeIn third" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Mot de passe ')" style="font-size: 15px;"/>

                <x-input id="password" class="fadeIn third"
                                type="password"
                                name="password"
                                required autocomplete="current-password" style="width: 300px; margin: 0 auto; font-size: 15px; height: 30px;"/>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span style="font-size: 12px;" class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
                </label>
            </div>
            
                        <!-- Remember Me 2 -->


            <div class="flex items-center justify-end mt-4" style="margin-right: 120px;">

         <input type="submit" class="fadeIn fourth" value="S'identifier" >

               <!-- <x-button class="ml-3" >
                    {{ __('Login') }}
                </x-button>-->
            </div>
        </form>
        <div id="formFooter">
                @if (Route::has('password.request'))
                    <a class="underlineHover" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié?') }}
                    </a>
                @endif
                  </div>

                </div>
              </div>
        </frame>
</x-guest-layout>
<style>
    body  {
      font-family: "Lato", sans-serif;
      background: url('images/bg.jpeg');

  }
 
        


  .main-head{
      height: 150px;
      background: #FFF;

  }

  .sidenav {
      height: 100%;
      background-color: #032c6a;
      overflow-x: hidden;
      padding-top: 20px;
  }


  .main {
      padding: 0px 10px;
  }

  @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
  }

  @media screen and (max-width: 450px) {
      .login-form{
          margin-top: 10%;
      }

      .register-form{
          margin-top: 10%;
      }
  }

  @media screen and (min-width: 768px){
      .main{
          margin-left: 40%;
      }

      .sidenav{
          width: 40%;
          position: fixed;
          z-index: 1;
          top: 0;
          left: 0;
      }

      .login-form{
          margin-top: 43%;
      }

      .register-form{
          margin-top: 43%;
      }
  }


  .login-main-text{
      margin-top: 20%;
      padding: 60px;
      color: #d0cfcc;
  }

  .login-main-text h2{

    background-color: #032c6a;
    text-align: center;
    color:#000;
    padding-top:10em;
    margin-top: -10px;
    size: 50%;

  }

  * {

  text-decoration: none;
  text-align: center;
  text-emphasis: size 100px;
  size: 100px;
  }
  .btn-black{
      background-color :#4a90e2;
      size: 300px;
      border-radius: 0%;
  }
  .btn-secondary{
      background-color: #4a90e2;
      size: 300px;
      border-radius: 0%;}

   .btn .btn-secondary:hover{
      background-color: black;
      color: #4a90e2;
  }

  /* BASIC */

  .main {


    /* background-size: 900px; */

  }


  a {
    color: #92badd;

    display:inline-block;
    text-decoration: none;
    font-weight: 400;
  }

  h2 {
    text-align: center;
    font-size: 16px;
    font-weight: 600;
    text-transform: uppercase;
    display:inline-block;
    margin: 40px 8px 10px 8px;
    color: #cccccc;
  }



  /* STRUCTURE */

  .wrapper {
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    width: 100%;
    min-height: 100%;
    padding: 20px;
  }

  #formContent {
    -webkit-border-radius: 10px 10px 10px 10px;
    border-radius: 10px 10px 10px 10px;
    background: #fff;
    padding: 30px;
    width: 90%;
    max-width: 450px;
    position: relative;
    padding: 0px;
    -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
    box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
    text-align: center;
  }

  #formFooter {
    background-color: #f6f6f6;
    border-top: 1px solid #dce8f1;
    padding: 25px;
    text-align: center;
    -webkit-border-radius: 0 0 10px 10px;
    border-radius: 0 0 10px 10px;
  }



  /* TABS */

  h2.inactive {
    color: #cccccc;
  }

  h2.active {
    color: #0d0d0d;
    border-bottom: 2px solid #5fbae9;
  }
  /* ANIMATIONS */

  /* Simple CSS3 Fade-in-down Animation */
  .fadeInDown {
    -webkit-animation-name: fadeInDown;
    animation-name: fadeInDown;
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
  }

  @-webkit-keyframes fadeInDown {
    0% {
      opacity: 0;
      -webkit-transform: translate3d(0, -100%, 0);
      transform: translate3d(0, -100%, 0);
    }
    100% {
      opacity: 1;
      -webkit-transform: none;
      transform: none;
    }
  }

  @keyframes fadeInDown {
    0% {
      opacity: 0;
      -webkit-transform: translate3d(0, -100%, 0);
      transform: translate3d(0, -100%, 0);
    }
    100% {
      opacity: 1;
      -webkit-transform: none;
      transform: none;
    }
  }

  /* Simple CSS3 Fade-in Animation */
  @-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
  @-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
  @keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

  .fadeIn {
    opacity:0;
    -webkit-animation:fadeIn ease-in 1;
    -moz-animation:fadeIn ease-in 1;
    animation:fadeIn ease-in 1;

    -webkit-animation-fill-mode:forwards;
    -moz-animation-fill-mode:forwards;
    animation-fill-mode:forwards;

    -webkit-animation-duration:1s;
    -moz-animation-duration:1s;
    animation-duration:1s;
  }

  .fadeIn.first {
    -webkit-animation-delay: 0.4s;
    -moz-animation-delay: 0.4s;
    animation-delay: 0.4s;
    background-size: 30px;
  }

  .fadeIn.second {
    -webkit-animation-delay: 0.6s;
    -moz-animation-delay: 0.6s;
    animation-delay: 0.6s;
  }

  .fadeIn.third {
    -webkit-animation-delay: 0.8s;
    -moz-animation-delay: 0.8s;
    animation-delay: 0.8s;
  }

  .fadeIn.fourth {
    -webkit-animation-delay: 1s;
    -moz-animation-delay: 1s;
    animation-delay: 1s;
  }
  .underlineHover{
    font-size: 15px;

  }
  /* Simple CSS3 Fade-in Animation */
  .underlineHover:after {
    display: block;
    left: 0;
    bottom: -10px;
    width: 0;
    height: 2px;
    background-color: #56baed;
    content: "";
    transition: width 0.2s;
  }

  .underlineHover:hover {
    color: #0d0d0d;

  }

  .underlineHover:hover:after{
    width: 100%;
  }

  h1{
      color:#60a0ff;
  }

  /* OTHERS */

  *:focus {
      outline: none;
  }

  #icon {
    width:30%;
  }
/* FORM TYPOGRAPHY*/

input[type=button], input[type=submit], input[type=reset]  {
  background-color: #56baed;
  border: none;
  color: white;
  padding: 15px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  text-transform: uppercase;
  font-size: 13px;
  -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
  margin: 5px 20px 40px 50px;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}

input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
  background-color: #39ace7;
}

input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
  -moz-transform: scale(0.95);
  -webkit-transform: scale(0.95);
  -o-transform: scale(0.95);
  -ms-transform: scale(0.95);
  transform: scale(0.95);
}

input[type=text] {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

input[type=text]:focus {
  background-color: #fff;
  border-bottom: 2px solid #5fbae9;
}

input[type=text]:placeholder {
  color: #cccccc;
}
      </style>
        <script>
   //made by vipul mirajkar thevipulm.appspot.com
  var TxtType = function(el, toRotate, period) {
      this.toRotate = toRotate;
      this.el = el;
      this.loopNum = 0;
      this.period = parseInt(period, 10) || 2000;
      this.txt = '';
      this.tick();
      this.isDeleting = false;
  };

  TxtType.prototype.tick = function() {
      var i = this.loopNum % this.toRotate.length;
      var fullTxt = this.toRotate[i];

      if (this.isDeleting) {
      this.txt = fullTxt.substring(0, this.txt.length - 1);
      } else {
      this.txt = fullTxt.substring(0, this.txt.length + 1);
      }

      this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

      var that = this;
      var delta = 200 - Math.random() * 100;

      if (this.isDeleting) { delta /= 2; }

      if (!this.isDeleting && this.txt === fullTxt) {
      delta = this.period;
      this.isDeleting = true;
      } else if (this.isDeleting && this.txt === '') {
      this.isDeleting = false;
      this.loopNum++;
      delta = 500;
      }

      setTimeout(function() {
      that.tick();
      }, delta);
  };

  window.onload = function() {
      var elements = document.getElementsByClassName('typewrite');
      for (var i=0; i<elements.length; i++) {
          var toRotate = elements[i].getAttribute('data-type');
          var period = elements[i].getAttribute('data-period');
          if (toRotate) {
            new TxtType(elements[i], JSON.parse(toRotate), period);
          }
      }
      // INJECT CSS
      var css = document.createElement("style");
      css.type = "text/css";
      css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
      document.body.appendChild(css);
  };

        </script>
