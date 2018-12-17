@extends('layouts.app')
@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home')}}">Dashboard</a></li> &nbsp;
				<li><a href="{{ url('/user')}}">Member</a></li> &nbsp;
				<li class="active">Profile Member</li>
			</ul>
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Profile Member</h2>
				</div>

				<div class="panel-body">


                   
                   	<div class="col-md-5">
                   	    <img class="img-responsive" src="http://www.pvhc.net/img240/uyttxprhsqycyximpzjb.png" style="width:30%;">
                   	  
		    <div class=" clearfix">
		        <h3>{{ $users->name }}</h3>
		       
		        <h4>{{ $users->email }}</h4>
                 
		       <hr>
		       
		        
		       
		    </div>
		</div>

						
					
                </div>
                </div>
                </div>
          

		</div>
	</div>
	
</div>
@endsection