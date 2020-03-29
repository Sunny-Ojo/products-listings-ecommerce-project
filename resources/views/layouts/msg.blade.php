@if (count($errors)> 0)
    @foreach ($errors->all() as $error)
<li class="alert alert-danger">{{$error}}</li>
    @endforeach
@endif

 @if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
    </div>
 @endif
 @if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
    </div>
 @endif
