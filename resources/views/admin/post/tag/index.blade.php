@extends('admin.layouts.app')


@section('page-name', 'Blog Post Tag')
@section('main')

<div class="content container-fluid">
					
@include('page-header')



	<div class="row">
		
		<div class="col-lg-12">
			<a class="btn btn-sm btn-primary" data-toggle="modal" href="#tag_modal">Add new Tag</a> 
			<br> <br>
			@include('validate')
			<br><br>	



			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Tag Data</h4>
					<a class="badge badge-success" href="">Published</a>
					<a class="badge badge-danger" href="">Trash</a>
				</div>
				<div class="card-body">
	

					<div class="table-responsive">
						<table class="table mb-0">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Slug</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								
								@forelse( $all_data as $data )
								<tr>
									<td>{{ $loop -> index + 1 }}</td>
									<td>{{ $data -> name }}</td>
									<td>{{ $data -> slug }}</td>
									<td>
										@if($data -> status == true)
										<span class="badge badge-success">Published</span>
										@else
										<span class="badge badge-danger">Unpublished</span>
										@endif
									</td>
									<td>
										

										@if($data -> status == true)
										<a class="btn btn-info" href="{{ route('tag.status', $data -> id) }}"><i class="fa fa-eye-slash"></i></a>
										@else
										<a class="btn btn-info" href="{{ route('tag.status', $data -> id) }}"><i class="fa fa-eye"></i></a>
										@endif


										<a class="btn btn-warning" href=""><i class="fa fa-edit"></i></a>
										<a class="btn btn-danger" href=""><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								@empty 
								<tr>
									<td class="text-center text-danger" colspan="5"> No tags found </td>
								</tr>
								@endforelse
								
								
								





								
								
							</tbody>
						</table>
					</div>

					
				</div>
			</div>

			
		</div>

	</div>

	
</div>	


<!-- Modal -->
<div id="tag_modal" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
	  <div class="modal-content">
		<form action="{{ route('tag.store') }}" method="POST">
			@csrf
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Add new tag</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">

			
				<div class="form-group">
					<label for="">Tag Name</label>
					<input name="name" class="form-control" type="text" placeholder="User Name">
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