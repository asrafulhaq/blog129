@extends('admin.layouts.app')


@section('page-name', 'Blog Post')
@section('main')

<div class="content container-fluid">
					
@include('page-header')



	<div class="row">
		
		<div class="col-lg-12">
			<a class="btn btn-sm btn-primary"  href="{{ route('post.create') }}">Add new post</a> 
			<br> <br>
			@include('validate')
	

			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Posts Data</h4>
					<a class="badge badge-success" href="">Published</a>
					<a class="badge badge-danger" href="">Trash</a>
				</div>
				<div class="card-body">
	

					<div class="table-responsive">
						<table id="post" class="table mb-0">
							<thead>
								<tr>
									<th>#</th>
									<th>Title</th>
									<th>Type</th>
									<th>Date</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								
								@forelse( $all_data as $data )
								<tr>
									<td>{{ $loop -> index + 1 }}</td>
									<td>{{ Str::of($data -> title) -> limit(20) }}</td>
									<td>
										@php
											$featured = json_decode($data -> featured);
											echo $featured -> post_type;
										@endphp
									</td>
									<td>{{ $data -> created_at -> diffForHumans() }}</td>
									{{-- date('M d, Y', strtotime($data -> created_at)) --}}
									<td>
										@if($data -> status == true)
										<span class="badge badge-success">Published</span>
										@else
										<span class="badge badge-danger">Unpublished</span>
										@endif
									</td>
									<td>
										

										@if($data -> status == true)
										<a class="btn btn-info" href="{{ route('cat.status', $data -> id) }}"><i class="fa fa-eye-slash"></i></a>
										@else
										<a class="btn btn-info" href="{{ route('cat.status', $data -> id) }}"><i class="fa fa-eye"></i></a>
										@endif


										<a class="btn btn-primary" href="{{ route('post.edit', $data -> id) }}"><i class="fa fa-link"></i></a>
										<a class="btn btn-warning" href="{{ route('post.edit', $data -> id) }}"><i class="fa fa-edit"></i></a>
										<form class="d-inline" action="{{ route('post.destroy', $data -> id) }}" method="POST">
											@csrf
											@method('DELETE')
 											<button class="btn btn-danger" ><i class="fa fa-trash"></i></button>
										</form>

									</td>
								</tr>
								@empty 
								<tr>
									<td class="text-center text-danger" colspan="6"> No posts found </td>
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




@endsection