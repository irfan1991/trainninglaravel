@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ route('home')}}">Dashboard</a></li>&nbsp;
				<li class="active">Buku</li>
			</ul>

			<div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Buku</h2>
            @if(session()->get('succes'))
				<div class="alert alert-success">
					{{ session()->get('succes') }}
					
				</div><br/>
				@endif
	
          </div>

          <div class="panel-body">
            <p> 
            <a class="btn btn-primary" href="{{ route('book.create') }}">Tambah</a> 
           
            </p>
           <table class="table table-striped">
		<thead>
			<tr>
				<td>No</td>
				<td>Cover</td>
				<td>Title</td>
				<td>Amount</td>
				<td>Author</td>
				<td colspan="2">Action</td>
			</tr>
		</thead>
		<tbody>
			@foreach($books as $book)
			<tr>
				<td>{{$no++}}</td>
				<td><img src="{{ asset('img/'.$book->cover)}}" width="150px" height="150px"></td>
				<td>{{$book->title}}</td>
				<td>{{$book->amount}}</td>
				<td>{{$book->author->name}}</td>
				<td><a href="{{ route('book.edit', $book->id) }}" class="btn btn-primary">Edit</a></td>
				<td>
					<form action="{{ route('book.destroy', $book->id)}}" method="POST">
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

@section('scripts')

@endsection

