@extends('layouts.nav')

@section('title', 'Products listing | Contact Us')

@section('content')
<div class="  mt-4">
   <h1 class="lead  text-center">Products Listing | Contact Us</h1>
   <hr>
<div class="row">
    <div class="col-md-8 col-lg-8 offset-md-2">
        {!! Form::open(['action' => 'ContactController@store', 'method' => 'POST']) !!}
        <div class="form-group">
          {{ Form::label('name', 'Enter your name') }}
          {{ form::text('name', '', ['class' => 'form-control',  ]) }}
      @error('name')  <li class="text-danger">{{ $message }}</li> @enderror
        </div>
        <div class="form-group">
          {{ Form::label('email', 'Enter your email') }}
          {{ form::email('email', '', ['class' => 'form-control', ]) }}
          @error('email')  <li class="text-danger">{{ $message }}</li> @enderror

        </div>
        <div class="form-group">
          {{ Form::label('message', 'Enter your message') }}
          {{ form::textarea('message', '', ['class' => 'form-control', ]) }}
          @error('message') <li class="text-danger">{{ $message }}</li> @enderror

        </div>
        <div class="form-group">
          {{ Form::submit('Send Message',  ['class' => 'btn btn-primary' ]) }}
        </div>
        {!! Form::close() !!}
    </div>
</div>
</div>
@endsection
