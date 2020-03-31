@extends('layouts.nav')

@section('title', 'Update a product')
@section('content')
    <div class="row mt-5">
        <div class="col-md-8 col-lg-8 offset-md-2">
            <div class="lead text-center bg-dark text-white-50 mb-3">
                Update Product
            </div>
  {{-- @include('layouts.msg') --}}
            {!! Form::open(['action'=>['ProductsController@update',  $product->id], 'method'=> 'PUT', 'files'=>'true']) !!}
            <div class="form-group">
                {{ Form::label('name' , 'Enter name of product') }}
                {{ Form::text('name', $product->name, ['class'=>'form-control', 'placeholder'=>'name of product']) }}
          @error('name')  <li class="text-danger">{{ $message }}</li> @enderror
            </div>
            <div class="form-group">
                {{ Form::label('prize' , 'Enter prize of product') }}
                {{ Form::text('prize', $product->prize, ['class'=>'form-control', 'placeholder'=>'prize of product']) }}
                @error('prize')  <li class="text-danger">{{ $message }}</li> @enderror

            </div>
            <div class="form-group">
                {{ Form::label('category' , 'Enter category of product') }}
                {{ Form::text('category', $product->category, ['class'=>'form-control', 'placeholder'=>'category of product']) }}
                @error('category')  <li class="text-danger">{{ $message }}</li> @enderror

            </div>

            <div class="form-group">
                {{ Form::label('productInformation' , 'Enter Information about product') }}
                {{ Form::textarea('productInformation', $product->about, ['class'=>'form-control', 'placeholder'=>'Information of the product']) }}
                @error('productInformation')  <li class="text-danger">{{ $message }}</li> @enderror
            </div>
            <div class="form-group">
                {{ Form::label('rating' , 'choose rating for the product') }}
                {{ Form::select('rating',['1' =>'1', '2'=>'2','3'=>'3','4'=>'4','5'=>'5'],  $product->rating, ['class'=>'form-control', 'placeholder'=>'product rating ']) }}
                @error('rating')  <li class="text-danger">{{ $message }}</li> @enderror

            </div>
            <div class="form-group">
                {{ Form::label('image' , 'upload image of product') }} <br>
                {{ Form::file('image') }} <br>
                @error('image')  <li class="text-danger">{{ $message }}</li> @enderror
            <img src="/storage/images/{{$product->image}}" alt="product image" style="width:35px:height:50;">
            </div>
            <div class="form-group">
                {{ Form::submit('Update product',['class'=> 'btn btn-outline-primary btn-block ']) }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
