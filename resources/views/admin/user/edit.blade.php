@extends('admin.layouts.app')

@section('main')

<div class="content container-fluid">
					
	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="page-title">Welcome Admin!</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item active">Dashboard</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /Page Header -->


	<div class="row">
		<div class="col-xl-6 d-flex">
			<div class="card flex-fill">
				<div class="card-header">
					<h4 class="card-title">Edit Staff data - {{ $data -> name }}</h4>
				</div>
				<div class="card-body">
					<form action="{{ route('staff.update', $data -> id) }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="form-group row">
							<label class="col-lg-3 col-form-label">Staff Name</label>
							<div class="col-lg-9">
								<input name="name" value="{{ $data -> name }}" type="text" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label">Email</label>
							<div class="col-lg-9">
								<input name="email" value="{{ $data -> email }}" type="text" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label">Cell</label>
							<div class="col-lg-9">
								<input name="cell" type="text" value="{{ $data -> cell }}" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label">Location</label>
							<div class="col-lg-9">
								<select name="location" class="form-control" tabindex="-1" aria-hidden="true">
									<option>Select</option>
									<option @if($data -> location == '' )  @endif value="">select</option>
									<option @if($data -> location == 'Mirpur' ) selected="selected"  @endif value="Mirpur">Mirpur</option>
									<option @if($data -> location == 'Uttara' ) selected="selected"  @endif value="Uttara">Uttara</option>
									<option @if($data -> location == 'Banani' ) selected="selected"  @endif value="Banani">Banani</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label">Gender</label>
							<div class="col-lg-9">
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="gender" id="gender_male" value="Male" checked="">
									<label class="form-check-label" for="gender_male">
									Male
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input"  type="radio" name="gender" id="gender_female" value="Female">
									<label class="form-check-label" checked="checked" for="gender_female">
									Female
									</label>
								</div>
							</div>
						</div>

						<div class="form-group row">		



							<label class="col-lg-3 col-form-label"></label>
							<br>
							<div class="col-lg-9">
								<input name="old_photo" type="hidden" value="{{ $data -> photo }}">
								<img style="width:200px;" src="{{ URL::to('media/staff/' . $data -> photo) }}" alt="">
							</div>
						</div>

						<div class="form-group row">		



							<label class="col-lg-3 col-form-label">Staff Photo</label>
							<br>
							<div class="col-lg-9">
								<input name="new_photo" type="file" class="form-control">
							</div>
						</div>



						<div class="text-right">
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
	
</div>	

@endsection