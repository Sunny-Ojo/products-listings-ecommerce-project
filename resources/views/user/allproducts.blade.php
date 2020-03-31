@extends('layouts.products')
@section('title', 'Products listing |  my  products')

@section('content')
{{-- @include('layouts.msg') --}}
{{-- <h4 class="lead text-center text-capitalize bg-dark text-white p-2">Items in your Cart</h4> --}}
@if (count($userproducts)> 0 )
        @foreach ($userproducts as $product)

{{-- <div class="row "> --}}
<div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-100">

    <a href="/userproducts/{{$product->id}}"
            ><img
                class="card-img-top"
    src="/storage/images/{{ $product->image}}"
                alt="product image"
         style=""/></a>
        <hr>
        {{-- <div class="card-body"> --}}
            <h4 class="card-title ml-2">
            <a href="/userproducts/{{ $product->id}}"> {{ $product->name   }}</a>
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
{{ $userproducts->links() }}
@else
<div class="container">
<h4 class="text-danger">You have no products!!!  <a href="/products/create" class="btn btn-warning">Add products?</a></h4>

</div>
@endif
@endsection
