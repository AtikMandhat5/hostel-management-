@extends('main')
@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
              <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                  RKU Hostelmanagement </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                  <div class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></div>
                  <span class="kt-subheader__breadcrumbs-separator"></span>
                  <div class="kt-subheader__breadcrumbs-link">
                    Users </div>
                  
                </div>
              </div>
</div>

<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

  <div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
      <div class="kt-portlet__head-label">
        <h3 class="kt-portlet__head-title">Users</h3>
      </div>
      <div class="kt-portlet__head-toolbar">
        <div class="kt-portlet__head-wrapper">
          <div class="dropdown dropdown-inline">
            <a href="{{route('add_user')}}" class="btn btn-brand btn-elevate btn-icon-sm">
              <i class="la la-plus"></i>
              Add User
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="kt-portlet__body">
      <table class="table table-striped- table-bordered table-hover table-checkable" id="tabl1">
        @csrf
        <thead class="">
          <tr>
            <th>Enrollment</th>
            <th>Name</th>
            <th>Branch</th>
            <th>Room No</th>
            <th>Mobile No</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
           @foreach($users as $row)
          <tr>
            <td>{{$row->enrollment}}</td>     
            <td>{{$row->name}}</td>
            <td>{{$row->branch}}</td>
            <td>{{$row->room_no}}</td>
            <td><a href="tel:+91{{$row->s_mobile}}">{{$row->s_mobile}}</a></td>  
            <td>  
              <input type="hidden" name="id" class="id" value="{{ $row->id }}" >    
              <a href="{{route('edit_user',$row->id)}}" title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md"> 
                            <i class="la la-edit"></i></a>
                
                <a href="https://wa.me/+91{{$row->s_mobile}}" title="whatsapp " class="btn btn-sm btn-clean btn-icon btn-icon-md"> 

                <i class="la la-whatsapp"></i></a> 

                <button  title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md delete"><i class="la la-trash"></i></button>
              </td>
            </tr>
            @endforeach
         
          
          </tbody>
        </table>
      </div>
    </div>
  </div><script>

  $(document).ready(function() {

    $('#tabl1').DataTable({
      columnDefs: [
      { orderable: false, targets: -1 }
      ],
      "processing": true,
      "aaSorting": [[0, 'desc']],
      "scrollX": true
    });

    $(document).on('click', '.delete', function ()
    {
      var obj = $(this);
      var id=$(this).closest('td').find(".id").val();
          // alert(id);
          // return;

          if (confirm('You will not be able recover this record')) 
          {
             $.ajax(
            {
              type: "POST",
              url: "{{route('delete_user')}}",
              data: {
                '_token': $('input[name="_token"]').val(),
                'id': id
              },
              cache: false,
              success: function (data)
              {
                obj.closest('tr').remove();
                alert("sucessful delete");
              }
            });
            }


          // swal({
          //   title: "Are you sure?",
          //   text: "You will not be able recover this record",
          //   type: "warning",
          //   showCancelButton: true,
          //   confirmButtonColor: "#DD6B55",
          //   confirmButtonText: "Yes delete it!",
          //   closeOnConfirm: false
          // },
          // function () {
          //   $.ajax(
          //   {
          //     type: "POST",
          //     url: "{{route('delete_user')}}",
          //     data: {
          //       '_token': $('input[name="_token"]').val(),
          //       'id': id
          //     },
          //     cache: false,
          //     success: function (data)
          //     {
          //       obj.closest('tr').remove();

          //     }
          //   });
          
          //   alert("Deleted", "Product Type has been deleted.", "success");
          // });
        });

  });

</script>

@stop




