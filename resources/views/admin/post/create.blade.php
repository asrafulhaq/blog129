@extends('admin.layouts.app')
@section('page-name', 'Blog Post create')
@section('main')

<div class="content container-fluid">
					
	@include('page-header')
	@include('validate')
	<form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
		@csrf
	<div class="row">
		<div class="col-xl-8 d-flex">
			<div class="card flex-fill">
				<div class="card-header">
					<h4 class="card-title">Add new Post</h4>
				</div>
				<div class="card-body">
					
						<div class="form-group ">
				
							<label for="">Title</label>
							<input name="title" type="text" class="form-control">
					
						</div>

						<div class="form-group ">
				
							<label for="">Post Type</label>
							<select class="form-control" name="ptype" id="post-type">
								<option value="">-select-</option>
								<option value="Standard">Standard</option>
								<option value="Gallery">Gallery</option>
								<option value="Video">Video</option>
								<option value="Audio">Audio</option>
								<option value="Quote">Quote</option>
							</select>
					
						</div>

						<div class="post-type-area">
							
						</div>

						{{-- <div class="form-group row">
							<label class="col-lg-3 col-form-label">Featured Image</label>
							<div class="col-lg-9">
								<input name="photo" type="file" class="form-control">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-3 col-form-label">Gallery</label>
							<div class="col-lg-9">
								<input name="photo" type="file" class="form-control">
							</div>
						</div>


						<div class="form-group row">
							<label class="col-lg-3 col-form-label">Video</label>
							<div class="col-lg-9">
								<input name="photo" type="text" class="form-control">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-3 col-form-label">Audio</label>
							<div class="col-lg-9">
								<input name="photo" type="text" class="form-control">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-3 col-form-label">Quote</label>
							<div class="col-lg-9">
								<textarea class="form-control" name="" id="" ></textarea>
							</div>
						</div> --}}

						<div class="form-group">
								<label for="">Content</label>
								<textarea id="posteditor" class="form-control" name="content" id="" ></textarea>
			
						</div>
						
						
						
						


						<div class="text-right">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
	
				</div>
			</div>
		</div>


		<div class="col-xl-4 d-flex">
			<div class="card flex-fill">
				<div class="card-header">
					<h4 class="card-title">Category & tags</h4>
				</div>
				<div class="card-body cats-list">
					<h6>Select Categories</h6>
					<hr>

					<style>
						.cats-list  li{
							list-style: none;
						}
					</style>
					<ul style="padding:0px">
						@forelse ($cats as $cat)
							<li><input name="pcat[]" type="checkbox" value="{{ $cat -> id }}" id="{{ $cat -> name }}"> <label for="{{ $cat -> name }}">{{ $cat -> name }}</label> </li>
						@empty
							<li>No categories found</li>
						@endforelse
					</ul>

					<h6>Select tags</h6>
					<hr>

					<select class="form-control post-tags" name="ptag[]" id="" name="tag[]" multiple="multiple">
						@foreach ($tags as $tag)
						<option value="{{ $tag -> id }}">{{ $tag -> name }}</option>
						@endforeach
						
					</select>

				</div>
			</div>
		</div>

	</div>

	</form>
	
</div>	


@endsection