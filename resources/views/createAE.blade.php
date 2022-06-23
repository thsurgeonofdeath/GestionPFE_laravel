@extends('Admin\master')
@section('content')


<form method="POST"  action="{{isset($user) ? route('Admin.update' ,[$user->id, $role]) : route('Admin.store' , $role)}}"  >
    @if (isset($user))
        @method('PUT');
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

        <input class="form-control" id="email" type="email" name="email" value="{{isset($user) ? $user->email: ''}}" required autofocus >
    </div>

    <!-- Password -->
    <div class="form-group">
        <label for="password"  >mot de passe</label>
        <input class="form-control"   id="password" 
                        type="password"
                        name="password"
                        @if (!isset($user))
                            required
                        @endif
                        >
                      
    </div>

    <!-- Confirm Password -->
    <div class="form-group">
        <label for="password_confirmation"  >mot de passe</label>

        <input  class="form-control"  id="password_confirmation" 
                        type="password"
                        name="password_confirmation"      
                         @if (!isset($user))
                        required
                        @endif>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success" class="form-control"  value="{{isset($user) ? 'modifier' : 'enregistrer'}}" >
    </div>
</form>
@endsection

