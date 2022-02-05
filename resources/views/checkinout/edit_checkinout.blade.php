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
                  <a href="{{route('view_checkinouts')}}" class="kt-subheader__breadcrumbs-link">
                    Checkoutin </a>
                </div>
          
                <div class="kt-subheader__breadcrumbs">
                  <span class="kt-subheader__breadcrumbs-separator"></span>
                  <div class="kt-subheader__breadcrumbs-link">
                    Edit Checkout-In </div>
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
              Edit Checkout-In
            </h3>
          </div>
        </div>
        <form class="kt-form edit_form" id="edit_form" name="edit_form">
          @csrf

          <div class="kt-portlet__body">
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                   <input type="hidden" class="form-control" value="{{$checkinout->id}}" name="id" id="id">

                  <label>User Enrollment No</label>
                  <select class="form-control" id="enrollment" name="enrollment">
                   <option>Select Enrollment</option>
                    <?php
                    foreach ($user as $data ) 
                    { 
                      $selected = '';
                      if($data->id == $checkinout->user_id) {
                        $selected = " selected";
                      }
                      ?>
                      <option {{ $selected }} value="{{ $data->id }}">{{ $data->enrollment }}</option>

                    <?php } ?>  
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label>Student Name</label>
                  <input type="text" class="form-control name" value="{{$data->name}}" placeholder="Student Name" name="name" id="name">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label>Branch</label>
                  <input type="text" class="form-control" value="{{$data->branch}}" placeholder="Branch" name="branch" id="branch">
                </div>
              </div>
             
              <div class="col-lg-4">
                <div class="form-group">
                  <label>Room No</label>
                  <input type="text" class="form-control"  value="{{$data->room_no}}" placeholder="Room No" name="roomno" id="roomno">
                </div>
              </div>

                   <!-- {{ date('d-m-Y h:i:s',strtotime($checkinout->out_time))  }} -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label>CheckOut Time</label>
                  <input type="datetime-local" class="form-control" value="2018-06-12T19:30" placeholder="Cheackout Time" name="outtime" id="outtime" required>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label>CheckIn Time</label>
                  <input type="datetime-local" class="form-control" value="{{$checkinout->out_time}}" placeholder="Cheackin Time" name="intime" id="intime" required>
                </div>
              </div>


              <!-- staff Action -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label>Action By</label>
                  <select class="form-control" placeholder="Approved By" name="action_by" id="action_by" >
                    <option value="0">Select CheckIn Approved By</option>
                    @foreach($admin as $row)
                    <option value="{{$row->id}}">
                      {{$row->name}}
                    </option>     
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label>Action Time </label>
                  <input type="datetime-local"  class="form-control" placeholder="Approved Time" name="action_time" id="action_time" >
                </div>
              </div>
              <!-- end staff -->
              
              

              <!-- Security -->
                <div class="col-lg-4">
                <div class="form-group">
                  <label>Checkout Approved By</label>
                  <select class="form-control" placeholder="Approved By" name="out_ap_by" id="out_ap_by">
                    <option value="0">Select Checkout Approved By</option>
                    @foreach($security as $row)
                    <option value="{{$row->id}}">
                      {{$row->name}}
                    </option>     
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label>Checkout Approved Time</label>
                  <input type="datetime-local"  class="form-control"  placeholder="Approved TIme" name="out_ap_time" id="out_ap_time">
                </div>
              </div> 

              <div class="col-lg-4">
                <div class="form-group">
                  <label>Checkin Approved By </label>
                  <select class="form-control" name="in_ap_by" id="in_ap_by">
                    <option value="0">Select CheckIn Approved By</option>
                    @foreach($security as $row)
                    <option value="{{$row->id}}">
                      {{$row->name}}
                    </option>     
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label>Checkin Approved Time</label>
                  <input type="datetime-local" class="form-control"  placeholder="Approved TIme" name="in_ap_time" id="in_ap_time" >
                </div>
              </div>


                          
            
              <div class="col-lg-8">
                <div class="form-group">
                  <label>Note</label>
                  <textarea cols="form-control" id="reason" name="reason" rows="5" class="col-12" placeholder="Write a reasone ......" >
                   {{$checkinout->reason}}
                  </textarea>
                  </div>
              </div>
              

          </div>

          <div class="kt-portlet__foot">
            <div class="kt-form__actions">
              <a href="{{ route('view_checkinouts')}}" class="btn btn-secondary">Back</a>
              <a type="button" href="view_checkinout" class="btn  btn-primary submit">Submit</a>
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
          url: "{{route('update_checkinout')}}",
          data: new FormData($('.edit_form')[0]),
          processData: false,
          contentType: false,
          success: function (data)
          {
            if (data.status === 'success') {
               alert("Updated Successfully ");
               document.location.href="{{ route('view_checkinouts')}}";
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