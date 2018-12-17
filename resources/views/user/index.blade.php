@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ route('home')}}">Dashboard</a></li>&nbsp;
				<li class="active">Member</li>
			</ul>

			<div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Member</h2>
            @if(session()->get('succes'))
				<div class="alert alert-warning">
					{{ session()->get('succes') }}
					
				</div><br/>
				@endif
	
          </div>

          <div class="panel-body">
            <p> 
            <a class="btn btn-primary" href="{{ route('user.create') }}">Tambah</a> 
           
            </p>
           <table class="table table-striped">
		<thead>
			<tr>
				<td>No</td>
				<td>Nama</td>
				<td>Email</td>
				<td colspan="2">Action</td>
			</tr>
		</thead>
		<tbody>
			@foreach($user2 as $users)
			<tr>
				<td>{{$no++}}</td>
				<td>{{$users->name}}</td>
				<td>{{$users->email}}</td>				
				<td><a href="{{ route('user.show', $users->id) }}" class="btn btn-primary">View</a></td>
				
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

@section('scripts')

@endsection

