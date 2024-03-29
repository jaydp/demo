<!-- edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
				<div class="card-header">
					Edit State
				  </div>
				  <div class="card-body">
					@if ($errors->any())
					  <div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							  <li>{{ $error }}</li>
							@endforeach
						</ul>
					  </div><br />
					@endif
					  <form method="post" action="{{ route('states.update', $state->id) }}">
						  <div class="form-group">
							  @csrf
							  @method('PATCH')
							  <label for="name">Name:</label>
							  <input type="text" class="form-control" name="name" value="{{$state->name}}"/>
						  </div>
						  <div class="form-group">
							  <label for="price">Order :</label>
							  <input type="text" class="form-control" name="order" value="{{$state->order}}"/>
						  </div>
						  <button type="submit" class="btn btn-primary">Update State</button>
					  </form>
				  </div>
            </div>
        </div>
    </div>
</div>
@endsection