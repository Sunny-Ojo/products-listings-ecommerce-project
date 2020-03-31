@extends('layouts.nav')
@section('title', 'Products listing |  item information')

@section('content')

<h4 class="lead text-center text-white bg-success p-2">{{$product->name}}</h4>
<a href="/wishlist" class="btn btn-info">Back</a>
@include('layouts.msg')

<div class="container row mt-4">
        <div class="col-lg-4 col-md-4 mb-4">
            <img
            class="card-img-top"
src="/storage/images/{{ $product->image}}"
            alt="product image"
     style=""/>
        </div>
        <div class="col-md-8 col-lg-8">
        <p>{{$product->about}}</p>
        <hr>
        <a class="mt-1 m-1 btn  btn-warning ">   <small class="text-dark">
            @if ($product->rating == 4)
            &#9733; &#9733; &#9733; &#9733;
            &#9734;
            @elseif ($product->rating == 3)
            &#9733; &#9733; &#9733; &#9734;
            &#9734;
            @elseif ($product->rating == 2)
            &#9733; &#9733; &#9734; &#9734;
            &#9734;
            @elseif ($product->rating == 1)
            &#9733; &#9734; &#9734; &#9734;
            &#9734;
            @else
            &#9733; &#9733; &#9733; &#9733;
            &#9733;
            @endif
          </small
          ></a>
        <a href="/items/{{$product->id}}"  class=" btn btn-success mt-1 m-1 ">Buy now {{ $product->prize }}</a>
@if (auth()->user()->id == $product->user_id)
{!! Form::open(['action' => ['WishlistController@destroy', $product->id], 'method'=>'DELETE']) !!}

{{ Form::submit('Remove from wishlist', ['class' => ['btn btn-danger', 'm-1']])}}
{!! Form::close() !!}
@endif
</div>

    </div>



@endsection
