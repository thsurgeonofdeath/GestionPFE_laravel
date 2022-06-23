@extends('Admin\master')
@section('content')
                     
                      @if (isset($users))
                      <h2 class="text-center" style="color: #124ca1; font-weight: bold ;">liste des {{Route::currentRouteName()}} </h2>
                      @if (Route::currentRouteName()=='Admin.admins')
                          <a class="btn btn-success" href="{{route('Admin.exportA')}}">admins excel format</a>
                      @endif
                      @if (Route::currentRouteName()=='Admin.encadrants')
                      <a class="btn btn-success" href="{{route('Admin.exportE')}}">encadrants excel format</a>
                      @endif
                      @if (Route::currentRouteName()=='Admin.etudiants' || Route::currentRouteName()=='Admin.search')
                     
                        <a class="btn btn-primary" href="{{route('Admin.createE')}}" >creer un etudiant</a>
                      <form action="{{route('Admin.search')}}" class="form" method="GET" id="form"  onchange="this.form.submit();">
                        @csrf
                        <div class="form-group">
                          <label for="niveau">niveau</label>
                          <select  class="form-control"  name="niveau" aria-label="Default select example"  >
                            <option value="3" 
                            @if ( isset($niveau))
                            @if ($niveau==3 )
                            selected
                            @endif
                              
                            @endif
                            >1 iere année CI </option>
                            <option 
                            @if ( isset($niveau))
                            @if ($niveau==4 )
                            selected
                            @endif
                                
                            @endif
                            value="4">2 ième année CI </option>
                            <option value="5"
                            @if ( isset($niveau))
                            @if ($niveau==5 )
                            selected
                            @endif
                                
                            @endif
                            >3 ième année CI</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="feliere">feliere</label>
                          <select name="feliere" id="feliere" class="form-control tagselector" >
                              @foreach ($felieres as $feliere)
                                <option value="{{$feliere->id}}"
                                  @if (  isset($fel))
                                  @if ($feliere->id==$fel)
                                  selected
                                   @endif
                                  @endif
                              
                                  >{{$feliere->intitule}}</option>
                              @endforeach
                          </select>
                        </div>
                        </form>
                        @endif
                        @if (Route::currentRouteName()=='Admin.admins')
                        <a class="btn btn-primary" href="{{route('Admin.create',$users->first()->role)}}" >creer un {{$users->first()->role}}</a>
                        @endif
                        @if (Route::currentRouteName()=='Admin.encadrants')
                        <a class="btn btn-primary" href="{{route('Admin.create',$users->first()->role)}}" >creer un {{$users->first()->role}}</a>
                        @endif
                      @endif
                    
                      
                      @if (isset($users))
                        <table class="table table-dark">
                          <thead>
                            <tr>
                              @if (isset($users))
                              @if (isset($users->first()->etudiant))
                                  <th scope="col">cne</th>    
                              @endif
                              @if (isset($users->first()->etudiant))
                              <th scope="col">niveau</th>    
                              @endif
                              @endif
                              <th scope="col">name</th>                        
                              <th scope="col">email</th>
                              <th scope="col">role</th>
                              <th>deleting</th>
                              <th>update </th>

                            </tr>
                          </thead>
                          <tbody>
                            @foreach($users as $user)
                            <tr>

                              @if (Route::currentRouteName()=='Admin.etudiants' || Route::currentRouteName()=='Admin.search')
                              <td>{{ $user->etudiant->cne}}</td>   
                              <td>{{ $user->etudiant->niveau}}</td>   
                              @endif
                              <td>{{ $user->name}}</</td>
                              <td>{{ $user->email}}</td>
                              <td>{{ $user->role}}</td>
                              <td>
                                <form action="{{route('Admin.destroy',$user->id)}}" method="get">
                                  @method('DELETE')
                                  <button type="submit" class="btn-danger btn">DELETE</button>
                                </form>
                              </td>
                           
                              <td>
                                @if (isset($users))
                                @if (Route::currentRouteName()=='Admin.etudiants' || Route::currentRouteName()=='Admin.search')
                                    <div>
                                      <a href="{{route('Admin.editE',$user->id)}}" class="btn btn-success">update</a>
                                    </div>   
                                    @else
                                    <div>
                                      <a href="{{route('Admin.edit',[$user->id,$user->role])}}" class="btn btn-success">update</a>
                                    </div>    
                                @endif           
                               
                                @endif
                               
                            </td>
                            </tr>
                            @endforeach
                            
                          </tbody>
                        </table>
                      @endif
       


@endsection
@section('scripts')
      <script>
      $('#form').on('change', function () {

        $('#form').submit();
      
      });
    </script>
@endsection