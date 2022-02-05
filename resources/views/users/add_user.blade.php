@extends('main')
@section('content')
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
              <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                  RKU Hostelmanagement </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                  <a href="view_users" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                  <span class="kt-subheader__breadcrumbs-separator"></span>
                  <div class="kt-subheader__breadcrumbs-link">
                    Users </div>
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
							Add User
						</h3>
					</div>
				</div>
				<form class="kt-form add_form" id="add_form" name="add_form">
					@csrf

					<div class="kt-portlet__body">
						<div class="row">
							<div class="col-lg-4">
								<div class="form-group">
									<label>User Role</label>
									<select class="form-control" name="role" id="role" onmousedown="this.value='';" onchange="jsFunction(this.value)">
									<?php
										foreach ($role as $data ) 
										{ 
											$selected = '';
											if($data->role_name == 'Student' && $data->id== '2') {
												$selected = " selected";
											}
											?>
											<option {{ $selected }} value="{{ $data->id }}">{{ $data->role_name }}</option>

										<?php } ?>	
									</select>
								</div>
							</div>
							<div class="col-lg-4 common">
								<div class="form-group">
									<label>Usersname</label>
									<input type="text" class="form-control"  placeholder="Usersname" name="name" id="name" required>
								</div>
							</div>
							<div class="col-lg-4 common">
								<div class="form-group">
									<label>Email Address</label>
									<input type="email" class="form-control"  placeholder="Email" name="email" id="email" required>
								</div>
							</div>
							
						</div>

						<div class="row">
							
							<div class="col-lg-4 student">
								<div class="form-group">
									<label>Enrollment No</label>
									<input type="text" class="form-control"  placeholder="Enrollment No" name="enrollment" id="enrollment" required>
								</div>
							</div>
							<div class="col-lg-4 student">
								<div class="form-group">
									<label>Branch</label>
									<input type="text" class="form-control "  placeholder="Branch" name="branch" id="branch" required>
								</div>
							</div>
							<div class="col-lg-4 student">
								<div class="form-group">
									<label>Hostelized</label>
									<select class="form-control" name="hostelized" id="hostelized">
									@foreach($hostelized as $row)
										<option value="{{$row->id}}">
											{{$row->hostelized_value}}
										</option>    
									@endforeach
									</select>
								</div>
							</div>

									
							<div class="col-lg-4 common">
								<div class="form-group">
									<label>User Mobile No</label>
									<input type="text" class="form-control"  placeholder="Students Mobile No" name="smobile" id="smobile" required>
								</div>
							</div>
							<div class="col-lg-4 student">
								<div class="form-group">
									<label>Parents Mobile No</label>
									<input type="text" class="form-control"  placeholder="Parents Mobile No" name="pmobile" id="pmobile" required>
								</div>
							</div>
							<div class="col-lg-2 hostelized student">
								<div class="form-group">
									<label>Room No</label>
									<input type="text" class="form-control"  placeholder="Room No" name="roomno" id="roomno" required>
								</div>
							</div>
							<div class="col-lg-2 student">
								<div class="form-group">
									<label>Status</label>
									<select class="form-control" name="status">
 										@foreach($status as $row)
										<option value="{{$row->id}}">
											{{$row->status_value}}
										</option>    
										@endforeach
									</select>
								</div>
							</div>

						</div>
						

					</div>

					<div class="kt-portlet__foot">
						<div class="kt-form__actions">
							<a href="{{ route('view_users')}}" class="btn btn-secondary">Back</a>
							<button type="button" class="btn btn-primary submit">Save User</button>
						</div>
					</div>
				</form>


			</div>
		</div>
	</div>
</div>

<script>

	$(document).ready(function(){

		 $("#role").change(function () {
            
            $role=$("#role").val();
        	
			if ($role==2){
				$(".student").show();
			}
			else
			{
			   $(".student").hide();	
			}

        });



		$(".submit").on("click", function (e)
		{
			e.preventDefault();
			if ($(".add_form").valid())
			{
				$.ajax({
					type: "POST",
					url: "{{route('save_user')}}",
					data: new FormData($('.add_form')[0]),
					processData: false,
					contentType: false,
					success: function (data)
					{
						if (data.status === 'success') {
							
							 alert(" Registration Successfull ");
							 document.location.href="{{ route('view_users')}}";
						}
						 else if (data.status === 'email_exist') {
							 alert("Your Email Already Exist! ");
							 document.location.href="{{ route('view_users')}}";
						}

						else if (data.status === 'error') {
							 alert("Error In Registration ! ");
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