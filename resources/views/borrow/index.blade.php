@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			
			<div class="panel panel-default">
         
          <div class="panel-heading">
            <h2 class="panel-title">Data Peminjaman Buku</h2>
            @if(session()->get('succes'))
				<div class="alert alert-success">
					{{ session()->get('succes') }}
					
				</div><br/>
				@endif
	
          </div>

          <div class="panel-body">
          
           <table class="table table-striped">
		<thead>
			<tr>
				<td>No</td>
				<td>Cover</td>
				<td>Title</td>
				<td>Amount</td>
				<td>Peminjam</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
			@foreach($books as $book)
			<tr>
				<td>{{
					

				$no++}}</td>
				<td><img src="{{ asset('img/'.$book->cover)}}" width="150px" height="150px"></td>
				<td>{{$book->title}}</td>
				<td>{{$book->amount}}</td>
				<td>{{$book->name}}</td>
				<td>

					@if($book->is_returned == 0 )
					
		<a href="{{ route('borrow.kembalian',$book->id) }}" class="btn btn-primary">Kembalian</a>

		{{-- <form action="{{ route('borrow.kembalian', $book->id)}}" method="POST">
						@csrf
						@method('get')
						
						<button class="btn btn-danger" type="submit">Kembalikan</button>
					</form> --}}

					@else
		<a href="#" class="btn btn-danger">Sudah Dikembalikan</a>
					@endif
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

