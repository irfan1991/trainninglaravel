@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home')}}">Dashboard</a></li> &nbsp;
				<li><a href="{{ url('/author')}}">Author</a></li> &nbsp;
				<li class="active">Ubah Author</li>
			</ul>
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Ubah Author</h2>
				</div>

				<div class="panel-body">
					{!! Form::model($author, ['url' => route('author.update', $author->id), 'method'=>'put', 'files' => 'true', 'class' => 'form-horizontal']) !!}
					
					@include('author._form')

					{!! Form::close() !!}
				</div>

			</div>

		</div>
	</div>
	
</div>
@endsection