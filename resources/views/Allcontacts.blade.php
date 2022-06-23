@extends('Admin\master')
@section('content')
@foreach ($contacts as $contact)
<div class="list-group list-group-item-warning">
      <div class="d-flex w-100 justify-content-between">
        <h3 class="mb-1 ">{{ $contact->name }}</h3s>
        <h5 class="mb-1 ">{{ $contact->email }}</h5>
        <small>{{ $contact->created_at->diffForHumans() }}</small>
      </div>
      <p class="mb-1"></p>
      <h1 class="text-primary">{{ $contact->message }}</h1>
      <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
           respond
        </a>
      </p>
      <div class="collapse" id="collapseExample">
        <div class="row">
            <div class="col-sm-12 form-group">
                <label for="message">
                    Message:</label>
                <textarea class="form-control" type="textarea" name="message" id="message" maxlength="6000" rows="7"></textarea>
                <a class="btn btn-success" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                send email 
             </a>
            </div>
            
        </div>
      </div>
</div>
    @endforeach
    @endsection
    @section('count')
    <span class="badge badge-dark">{{$count}}</span>
    @endsection