@extends('main')
@section('content')

<div class="kt-subheader   kt-grid__item" id="kt_subheader">
              <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                  RKU Hostelmanagement </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                  <div class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></div>
                  <span class="kt-subheader__breadcrumbs-separator"></span>
                  <a href="{{route('view_users')}}" class="kt-subheader__breadcrumbs-link">
                    Users </a>
                </div>
    		  
                <div class="kt-subheader__breadcrumbs">
                  <span class="kt-subheader__breadcrumbs-separator"></span>
                  <div class="kt-subheader__breadcrumbs-link">
                    Edit User </div>
                </div>
                
    	
              </div>
</div>
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	<div class="row">
		<div class="col-md-12">
			
			<div class="kt-portlet">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
							Edit Users 
						</h3>
					</div>
				</div>
				<form class="kt-form edit_form" id="edit_form" name="edit_form">
					@csrf
				<input type="hidden" class="form-control" value="{{$edit_form->id}}" name="id" id="id">
					<div class="kt-portlet__body">
						<div class="row">
							<div class="col-4">
								<div class="form-group">
									<label>User Role</label>
									<select class="form-control" name="role">
										<option>Select Role</option>
										<?php
										foreach ($role as $data ) 
										{ 
											$selected = '';
											if($data->id == $edit_form->role) {
												$selected = " selected";
											}
											?>
											<option {{ $selected }} value="{{ $data->id }}">{{ $data->role_name }}</option>

										<?php } ?>	
									</select>
								</div>
							</div>
							<div class="col-4">
								<div class="form-group">
									<label>Student Name</label>
									<input type="text" class="form-control" value="{{$edit_form->name}}" placeholder="user Name:" name="name" id="name" required>
								</div>
							</div>
							<div class="col-4">
								<div class="form-group">
									<label>Email Address</label>
									<input type="email" class="form-control" value="{{$edit_form->email}}" placeholder="Email" name="email" id="email" required>
								</div>
							</div>
								

							
						</div>

						<div class="row">
							<div class="col-4">
								<div class="form-group">
									<label>Enrollment No</label>
									<input type="text" class="form-control" value="{{$edit_form->enrollment}}" placeholder="Enrollment No" name="enrollment" id="enrollment" required>
								</div>
							</div>
							<div class="col-4">
								<div class="form-group">
									<label>Branch</label>
									<input type="text" class="form-control" value="{{$edit_form->branch}}" placeholder="Branch" name="branch" id="branch" required>
								</div>
							</div>
							<div class="col-4">
								<div class="form-group">
									<label>Hostelized</label>
									<select class="form-control" name="hostelized" id="hostelized">
									<option>Chose One</option>
									<?php
										foreach ($hostelized as $data ) 
										{ 
											$selected = '';
											if($data->id == $edit_form->hostelized) {
												$selected = " selected";
											}
											?>
											<option {{ $selected }} value="{{ $data->id }}">{{ $data->hostelized_value }}</option>

										<?php } ?>	
									</select>
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>Student Mobile No</label>
									<input type="text" class="form-control" value="{{$edit_form->s_mobile}}" placeholder="Students Mobile No" name="smobile" id="smobile" required>
								</div>
							</div>
						

							<div class="col-4">
								<div class="form-group">
									<label>Parents Mobile No</label>
									<input type="text" class="form-control" value="{{$edit_form->p_mobile}}" placeholder="Parents Mobile No" name="pmobile" id="pmobile" required>
								</div>
							</div>
							
							
							<div class="col-2">
								<div class="form-group">
									<label>Room No</label>
									<input type="text" class="form-control" value="{{$edit_form->room_no}}"  placeholder="Room No" name="roomno" id="roomno" required>
								</div>
							</div>
							
						
							
							<div class="col-2">
								<div class="form-group">
									<label>Status</label>
									<select class="form-control" name="status">
										<option>Select Status</option>
											<?php
										foreach ($status as $data ) 
										{ 
											$selected = '';
											if($data->id == $edit_form->status) {
												$selected = " selected";
											}
											?>
											<option {{ $selected }} value="{{ $data->id }}">{{ $data->status_value }}</option>

										<?php } ?>	


									</select>
								</div>
							</div>

						</div>
						

					</div>

					<div class="kt-portlet__foot">
						<div class="kt-form__actions">
							<a href="{{route('view_users')}}" class="btn btn-secondary">Back</a>
							<button type="button" class="btn btn-primary submit">Update</button>
						</div>
					</div>
				</form>


			</div>
		</div>

	</div>
</div>

<script>

	$(document).ready(function(){
		$(".submit").on("click", function (e)
		{
			e.preventDefault();
			if ($(".edit_form").valid())
			{
				$.ajax({
					type: "POST",
					url: "{{route('update_user')}}",
					data: new FormData($('.edit_form')[0]),
					processData: false,
					contentType: false,
					success: function (data)
					{
						if (data.status === 'success') {
							 alert("Updated Successfully ");
							 document.location.href="{{ route('view_users')}}";
						} 
						else if (data.status === 'error') {
							alert("Opps.! Something Went to Wrong!")
							
						}
					}
				});
			}
			else
			{
				e.preventDefault();
			}
		});


	});
</script>



@stop