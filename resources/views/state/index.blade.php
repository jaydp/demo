<!-- index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('States') }}</div>

                <div class="card-body">
                    @if(session()->get('success'))
					<div class="alert alert-success">
						{{ session()->get('success') }}  
					</div><br />
					@endif
					<table class="table table-striped">
						<thead>
							<tr>
								<td>ID</td>
								<td>State Name</td>
								<td>Order</td>
								<td colspan="2">Action</td>
							</tr>
						</thead>
						<tbody>
							@foreach($states as $state)
							<tr>
								<td>{{$state->id}}</td>
								<td>{{$state->name}}</td>
								<td>{{$state->order}}</td>
								<td><a href="{{ route('states.edit',$state->id)}}" class="btn btn-primary">Edit</a></td>
								<td>
									<form action="{{ route('states.destroy', $state->id)}}" method="post">
										@csrf
										@method('DELETE')
										<button class="btn btn-danger" type="submit">Delete</button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection