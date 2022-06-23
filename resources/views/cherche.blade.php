@extends('Encadrant\EncadrantMaster')

@section('contentE')
<body>
    <style>
        .contentt{
            border-collapse: collapse;
            margin-left: 35%;
            margin-top: 30px;
            font-size: 1.2em;
            min-width: 400px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
        }

        .contentt thead tr{
            background-color: #009879;
            color:#ffffff;
            text-align: left;
            font-weight: bold;
        }

        .contentt th,
        .contentt td{
            padding: 12px 15px;
        }

        .contentt tbody tr{
            border-bottom: 1px solid #dddddd;
            background-color: whitesmoke;
        }
        .contentt tbody tr:nth-of-type(even){
            background-color: #f3f3f3
        }

        .contentt tbody tr:last-of-type{
            border-bottom: 3px solid #009879;
        }
        .bingo{
            text-align: center;
            color: red
        }

    </style>
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
        <form action="/cherche" method="GET" >
    
          <div class="form-group">
          <input type="text" class="form-control" name="query" placeholder="Rechercher Un Prof" required>
        </div>
        <div>
          <button type="submit" class="btn pull-center"> Rechercher </button>
      </div>
    
          
        </form>
    
        @yield('contentE')
       
    
    
    </div >
    <div style="  padding-bottom: 20px;">
    <table class="contentt">
        @foreach ($users as $user)
        @if ($user->role == 'encadrant')
        <thead>
            <th>Nom</th>
            <th>Email</th>
        </thead>
        <tbody>

            <tr>
            <td >{{$user->name}}</td>
            <td>{{$user->email}}</td>
        </tr>
        @else
        <h2 class="bingo" >Pas de résultat !</h2>
        @endif
        @endforeach
    </tbody>
    </table>
</body>


@endsection