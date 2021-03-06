@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home')}}">Dashboard </a></li>&nbsp;
				<li><a href="{{ url('/author')}}">Author</a></li>&nbsp;
				<li class="active">Tambah Author</li>
			</ul>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Tambah Author</h2>
				</div>
				<div class="panel-body">
					<ul class=" nav nav-tabs" role="tablist">
						 <li role="presentation" class="active">
			                <a href="#form" aria-controls="form" role="tab" data-toggle="tab">
			                  <i class="fa fa-pencil-square-o"></i> Isi Form
			                </a>
              			</li>

              			<li role="presentation">
			                <a href="#upload" aria-controls="upload" role="tab" data-toggle="tab">
			                  <i class="fa fa-cloud-upload"></i> Upload Excel
			                </a>
			            </li>
					</ul>

					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="form">
							{!! Form::open(['url' => route('author.store'), 'method' => 'post', 'files' => 'true', 'class'=>'form-horizontal']) !!}
									
								@include('author._form')

							{!! Form::close() !!}
						</div>
						<div role="tabpanel" class="tab-pane" id="upload">
							Isi Untuk Upload Excel
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection