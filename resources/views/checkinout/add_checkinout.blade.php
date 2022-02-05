@extends('main')
@section('content')
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
              <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                  RKU Hostelmanagement </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                  <a href="{{route('view_checkinouts')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                  <span class="kt-subheader__breadcrumbs-separator"></span>
                  <div class="kt-subheader__breadcrumbs-link">
                    Checkouin </div>
                </div>
          
                <div class="kt-subheader__breadcrumbs">
                  <span class="kt-subheader__breadcrumbs-separator"></span>
                  <div  class="kt-subheader__breadcrumbs-link">
                    Add Checkout-In </div>
                </div>
                
      
              </div>
</div>

<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
  <div class="row">
    <div class="col-md-12">
      
      <div class="kt-portlet">
        <div class="kt-portlet__head ">
          <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
              Add Checkou-In
            </h3>
          </div>
        </div>
        <form class="kt-form add_form" id="add_form" name="add_form">
          @csrf



          <div class="kt-portlet__body">
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                  <label>User Enrollment No</label>
                  <select class="form-control" id="enrollment" name="enrollment">
                    <option>Select Enrollment</option>
                    @foreach($student as $row)
                    <option value="{{$row->id}}">
                      {{$row->enrollment}}
                    </option>     
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label>Student Name</label>
                  <input type="text" class="form-control name" placeholder="Student Name" name="name" id="name">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label>Branch</label>
                  <input type="text" class="form-control" value="" placeholder="Branch" name="branch" id="branch">
                </div>
              </div>
             
              <div class="col-lg-4">
                <div class="form-group">
                  <label>Room No</label>
                  <input type="text" class="form-control"  value="" placeholder="Room No" name="roomno" id="roomno">
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label>CheckOut Time</label>
                  <input type="datetime-local" class="form-control"  placeholder="Cheackout Time" name="outtime" id="chtime" required>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label>CheckIn Time</label>
                  <input type="datetime-local" class="form-control"  placeholder="Cheackin Time" name="intime" id="intime" required>
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
                  <textarea cols="form-control" id="reason" name="reason" rows="5" class="col-12" placeholder="Write a reasone ......"></textarea>
                  </div>
              </div>
              

          </div>

          <div class="kt-portlet__foot">
            <div class="kt-form__actions">
              <a href="{{route('view_checkinouts')}}" class="btn btn-secondary">Back</a>
           <button type="button" class="btn btn-primary submit">Submit</button>
            </div>
          </div>
        </form>


      </div>
    </div>
  </div>
</div>

<script>

  $(document).ready(function(){

       $(document).on("change", "#enrollment", function () {
        var enrollment = $(this).val();
        $.ajax({
            type: "POST",
          url: "{{route('get_detail')}}",
          dataType:'json',
          data:{
                '_token': $('input[name="_token"]').val(),
                  'enrollment': enrollment
            },
            success: function (data)
            { 
                var response = data.users[0];
                //alert(response[0]);
                      console.log(response);
                      // var name =$(".name").html(name);
                      $("#name").val(response.name);
                      $("#branch").val(response.branch);  
                      $("#roomno").val(response.room_no);  

               }

        });
    });


    $(".submit").on("click", function (e)
    {
      e.preventDefault();
      if ($(".add_form").valid())
      {
        $.ajax({
          type: "POST",
          url: "{{route('save_checkinout')}}",
          data: new FormData($('.add_form')[0]),
          processData: false,
          contentType: false,
          success: function (data)
          {
            if (data.status === 'success') {
              window.location = "{{ route('view_checkinouts')}}";
              
            }
             

            else if (data.status === 'error') {
               alert("Error In Cheackin-Out ! ");
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