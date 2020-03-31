@extends('layouts.nav')
@section('content')
    <div class="row mt-5">
        <div class="col-md-8 col-lg-8 offset-md-2">
            <div class="lead text-center bg-dark text-white-50 mb-3">
                Create a new Product
            </div>
  @include('layouts.msg')
            {!! Form::open(['action'=>'ProductsController@store', 'method'=> 'POST', 'files'=>'true']) !!}
            <div class="form-group">
                {{ Form::label('name' , 'Enter name of product') }}
                {{ Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'name of product']) }}
            </div>
            <div class="form-group">
                {{ Form::label('prize' , 'Enter prize of product') }}
                {{ Form::text('prize', '', ['class'=>'form-control', 'placeholder'=>'prize of product']) }}
            </div>
            <div class="form-group">
                {{ Form::label('category' , 'Enter category of product') }}
                {{ Form::text('category', '', ['class'=>'form-control', 'placeholder'=>'category of product']) }}
            </div>

            <div class="form-group">
                {{ Form::label('productInformation' , 'Enter Information about product') }}
                {{ Form::textarea('productInformation', '', ['class'=>'form-control', 'placeholder'=>'Information of the product']) }}
            </div>
            <div class="form-group">
                {{ Form::label('rating' , 'choose rating for the product') }}
                {{ Form::select('rating',['1' =>'1', '2'=>'2','3'=>'3','4'=>'4','5'=>'5'],  '', ['class'=>'form-control', 'placeholder'=>'product rating ']) }}
            </div>
            <div class="form-group">
                {{ Form::label('image' , 'upload image of product') }} <br>
                {{ Form::file('image') }}
            </div>
            <div class="form-group">
                {{ Form::submit('Create',['class'=> 'btn btn-outline-primary btn-block ']) }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
