@extends('layouts.products')
@section('title', 'Products listing |  wishlist items')

@section('content')
{{-- @include('layouts.msg') --}}
{{-- <h4 class="lead text-center text-capitalize bg-dark text-white p-2">Items in your Cart</h4> --}}
@if (count($wishlist)> 0 )
        @foreach ($wishlist as $product)

{{-- <div class="row "> --}}
<div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-100">

    <a href="/wishlists/{{$product->id}}"
            ><img
                class="card-img-top"
    src="/storage/images/{{ $product->image}}"
                alt="product image"
         style=""/></a>
        <hr>
        {{-- <div class="card-body"> --}}
            <h4 class="card-title ml-2">
            <a href="/wishlists/{{ $product->id}}"> {{ $product->name   }}</a>
            </h4>
            <small class="ml-2"><b>{{ $product->prize }}</b></small>

            <small class="ml-2 mb-1 text-dark">
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
            >
        </div>
    </div>
{{-- </div> --}}
@endforeach
{{-- {{ $wishlist->links() }} --}}
@else
<h4 class="ml-3 lead">There are no items in your wishlist <a href="/products" class="btn  btn-success" >look for a product you like?</a>
</h4>
@endif

@endsection
