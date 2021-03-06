@extends('layouts.app')

@section('title','Patients | MediCMS')


@section("body")
	

<!--Page header-->	
<div class="page-header">
	<h1><div class="row">
		<div class="col-sm-8">
			<a style="text-decoration: none; color: inherit;" href="patients_view.php">
				<i class="fa fa-user" aria-hidden="true"></i>
				Patients
			</a>
		</div>
		
		</div>
	</h1>
</div><!--Page header-->	


<!--Button groups-->
<div id="top_buttons" class="hidden-print">
	<div class="btn-group visible-md visible-lg all_records pull-left">
		

		<a href="{{url('patient/create')}}" class="btn btn-success "><i class="fa fa-plus" aria-hidden="true"></i>  Add New</a>
		
		<button type="submit" name="NoFilter_x" id="clearall" value="1" class="btn btn-default">
			<i class="fa fa-times" aria-hidden="true"></i>
			Show All
		</button>
	</div>
</div><!--Button groups-->

<div class="col-sm-4 pull-right">
			<div class="input-group" id="quick-search">
				<input type="text" name="SearchString" value="" class="form-control" placeholder="Quick Search" id="quicksearch" >
				<span class="input-group-btn">
					
					<button name="NoFilter_x" value="1" id="cancelsearch" type="submit" class="btn btn-default" title="Show All">
						<i class="fa fa-times" aria-hidden="true"></i>
					</button>
				</span>
			</div>
		</div>
<div class="clearfix"></div>
<p></p>


<!--patient table-->
<div class="rowxx">

	<div class="panel panel-default">
		<div class="panel-heading">
			Patients			
			<a href="{{url('patient/create')}}" class="btn btn-primary btn-xs pull-right"><i class="fa fa-plus" aria-hidden="true"></i></a>
		</div>
		<div class="panel-body">
			<div class="table-responsive">	
				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Gender</th>					
							<th>Age</th>
							<th>Tobaco Usage</th>
							<th>Alcohol Intake</th>
							<th>Mobile</th>
							<th>Email</th>
							<th>Address</th>
							<th>City</th>
							<th>State</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody id="patienttable">
					@foreach($patients as $patient)
						<tr id="{{$patient-> id}}" data-toggle="modal" data-target="#myModal-edit" class="table-row"> 
							<td data-toggle="tooltip">{{$patient-> firstname}},{{$patient-> lastname}}</td>
							<td>{{$patient-> gender}}</td>					
							<td data-toggle="tooltip" title="{{$patient-> birth_date}}">{{$patient-> age}}</td>	
							<td >{{$patient-> tobaco_usage}}</td>
							<td>{{$patient-> alcohol_intake}}</td>
							<td>{{$patient-> mobile}}</td>
							<td>{{$patient-> email}}</td>
							<td>{{$patient-> address}}</td>
							<td>{{$patient-> city}}</td>
							<td>{{$patient-> state}}</td>		
							<td><a href="{{url('patient/' .$patient->id. '/edit')}}"><button class="btn btn-warning btn-xs" type="submit"><i class="fa fa-pencil" aria-hidden="true"></i></button></a></td>
							<td>
								<form action="{{ action('PatientControler@store')}}/{{$patient->id}}" class="pull-right" method="post">
									{{csrf_field()}}
									{{method_field('DELETE')}}
									<button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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


@endsection