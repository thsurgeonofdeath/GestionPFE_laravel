@extends('Admin\master')
@section('content')


<form method="POST"   action="{{isset($user) ? route('Admin.updateE',$user->id) : route('Admin.storeE')}}" >
    @if (isset($user))
        @method('PUT')
    @endif
    @csrf
 
        <x-auth-validation-errors class="alert alert-danger mb-4"  :errors="$errors" />

    

    <!-- Name -->
    <div class="form-group">
        <label for="name"  >Nom et prenom</label>
        <input class="form-control" id="name"  type="text" name="name" value="{{isset($user) ? $user->name: ''}}" required autofocus >
    </div>

    <!-- Email Address -->
    <div class="form-group">
        <label for="email"  >Email</label>

        <input class="form-control" type="email" name="email" value="{{isset($user) ? $user->email: ''}}" required autofocus >
    </div>

    <!-- Password -->
    <div class="form-group">
        <label for="password"   >mot de passe</label>
        <input class="form-control"   id="password" 
                        type="password"
                        name="password"
                        @if (!isset($user))
                            required
                        @endif>
                      
    </div>

    <!-- Confirm Password -->
    <div class="form-group">
        <label for="password_confirmation"    >confirmer mot de passe</label>
        <input  class="form-control"  id="password_confirmation" 
                        type="password"
                        name="password_confirmation"      
                       
                         @if (!isset($user))
                        required
                        @endif>
      </div>
    <div class="form-group">
        <label for="cne">Cne</label>
        <input class="form-control"  type="text" id="cne" name="cne" value="{{isset($user) ? $user->etudiant->cne: ''}}" pattern="[A-Za-z][0-9]{9}">
    </div>
    <div class="form-group">
        <label for="niveau">niveau</label>
        <select class="form-control" id="niveau" name="niveau">
          <option
          @if (isset($user))
              @if ($user->etudiant->niveau==1)
                  selected
              @endif
          @endif
          >1
        </option>
          <option
          @if (isset($user))
          @if ($user->etudiant->niveau==2)
              selected
          @endif
         @endif>2</option>
          <option
          @if (isset($user))
          @if ($user->etudiant->niveau==3)
              selected
          @endif
      @endif
      >3</option>
          <option
          @if (isset($user))
          @if ($user->etudiant->niveau==4)
              selected
          @endif
      @endif
      >4</option>
          <option
          @if (isset($user))
          @if ($user->etudiant->niveau==5)
              selected
          @endif
      @endif
      >5</option>
        </select>
    </div>
    <div class="form-group">
        <label for="feliere">feliere</label>
        <select name="feliere" id="feliere" class="form-control tagselector" >
            @foreach ($felieres as $feliere)
               <option value="{{$feliere->id}}"
                @if (isset($user))
                @if ($user->etudiant->filiere->id==$feliere->id)
                    selected
                @endif
                @endif
                >{{$feliere->intitule}}</option>
            @endforeach
            
        </select>
      </div>
    <div   class="form-group">
        <input type="submit" class="btn btn-success" class="form-control"  value="{{isset($user) ? 'modifier' : 'enregistrer'}}" >
</form>
@endsection

