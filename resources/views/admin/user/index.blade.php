@extends('admin.layouts.app')


@section('page-name', 'User Management')
@section('main')

<div class="content container-fluid">
					
@include('page-header')



	<div class="row">
		
		<div class="col-lg-12">
			<a class="btn btn-sm btn-primary" data-toggle="modal" href="#user_modal">Add new User</a>
			<br><br>	

			@if(Session::has('success'))
				<p class="alert alert-success">{{ Session::get('success') }} <button class="close" data-dismiss="alert">&times;</button></p>
			@endif

			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Users Data</h4>
					<a class="badge badge-success" href="">Published</a>
					<a class="badge badge-danger" href="">Trash</a>
				</div>
				<div class="card-body">
					<form action="" method="POST" class="form-inline">
						@csrf 
						<div class="form-group">
							<input name="search" class="form-control" type="text" placeholder="Search">
						</div>
						<div class="form-group">
							<input class="btn btn-primary" type="submit" value="Search">
						</div>
					</form>
					<hr>
					<div class="table-responsive">
						<table class="table mb-0">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Email</th>
									<th>Cell</th>
									<th>Role</th>
									<th>Status</th>
									<th>Photo</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach( $all_data as $data )
								<tr>
									<td>{{ $loop -> index + 1 }}</td>
									<td>{{ $data -> name }}</td>
									<td>{{ $data -> email }}</td>
									<td>{{ $data -> cell }}</td>
									<td>@if(isset($data -> role -> name )) {{ $data -> role -> name  }} @endif</td>
									<td>
										<div class="status-toggle">
											<input type="checkbox" id="status_1" class="check" checked="">
											<label for="status_1" class="checktoggle">checkbox</label>
										</div>
									</td>
									<td>
										
										@if( $data -> photo !== NULL)
										<img style="width:50px;height:50px;" src="{{ URL::to('/media/users/' . $data -> photo) }}" alt="">
										@else 
										<img style="width:50px;height:50px;" src="{{ URL::to('admin/assets/img/avatar.jpg') }}" alt="">
										@endif
									
									
									</td>
									<td>
										<a class="btn btn-info" href="#"><i class="fa fa-eye"></i></a>
										<a class="btn btn-warning" href=""><i class="fa fa-edit"></i></a>
										<a class="btn btn-danger" href=""><i class="fa fa-trash"></i></a>
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

	
</div>	


<!-- Modal -->
<div id="user_modal" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
	  <div class="modal-content">
		<form action="{{ route('user.store') }}" method="POST">
			@csrf
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Add new user</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">

			
				<div class="form-group">
					<label for="">Name</label>
					<input name="name" class="form-control" type="text" placeholder="User Name">
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input name="email" class="form-control" type="text" placeholder="Email">
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<input name="pass" class="form-control" type="text" value="{{ $randpass }}"  placeholder="Password">
				</div>
				<div class="form-group">
					<label for="">Role</label>
					<select  class="form-control" name="role" id="">
						<option value="">-select-</option>

						@foreach($roles  as $role)
						<option value="{{ $role -> id }}">{{ $role -> name }}</option>
						@endforeach


					</select>
				</div>
				

			


		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  <button type="submit" class="btn btn-primary">Save changes</button>
		</div>
	</form>
	  </div>
	</div>
  </div>



@endsection