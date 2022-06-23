@extends('master')
@section('contentWelcome')
   

     {{--Carousel--}}
        

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="./images/ensaf.jpg" class="d-block w-100" alt="food-2">
              <div class="carousel-caption d-none d-md-block">
                <h5>Université Sidi Mohamed Ben Abdellah</h5>
                <p>École Nationale des Sciences Appliquées.</p>
              </div>

            </div>
            <div class="carousel-item">
              <img src="./images/success2.png" class="d-block w-100" alt="food-2" >
              <div class="carousel-caption d-none d-md-block">
                <h5>Le chemin de la réussite,</h5>
                <p>n'est pas une ligne droite.</p>
              </div>            </div>
            <div class="carousel-item">
              <img src="./images/usmba.jpg" class="d-block w-100" alt="food-3">
              <div class="carousel-caption d-none d-md-block">
                <p>L’Université Sidi Mohamed Ben Abdellah de Fès,</p>
                <h5>occupe la première place au niveau national.</h5>

              </div>            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
         @endsection



