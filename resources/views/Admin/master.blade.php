<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Espace Admin</title>
    <link rel = "icon" href = "{{url('images/','logos.jpeg') }}" type = "image/x-icon">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Latest compiled and minified CSS -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        {{-- AJAX --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- Optional theme -->
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        @yield('style')
</head>
<body style="background:url({{asset('images/bg.jpeg')}});">
    {{View::make('Admin\header')}}
        <main class="py-4">
              <div class="container">
                  <div class="row">
                      <div class="col-md-3">
                          <ul class="list-group">
                              <li class="list-group-item">
                                  <a  href="{{route('Admin.etudiants')}}">liste des etuudiants </a>
                              </li>
                              <li class="list-group-item">
                                <a  href="{{route('Admin.encadrants')}}">liste des encadrants</a>
                            </li>
                            <li class="list-group-item">
                              <a  href="{{route('Admin.admins')}}">liste des admins </a>
                          </li>
                          <li class="list-group-item">
                            <a  href="{{route('contacts.index')}}">liste des messages  </a>
                            @yield('count')
                        </li>
                          </ul>
                      </div>
                     
                      <div class="col-md-9">
                        @yield('content')
                      </div>
                     
                  </div>
              </div>                
         </main>
  
</body>
</html>
@yield('scripts')
