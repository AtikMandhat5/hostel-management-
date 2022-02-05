$(document).ready(function () {

    $('.lead_tbl').DataTable({
//        "ordering": false
        "aaSorting": [[0, 'desc']],
        "columnDefs": [
            {orderable: false, targets: -1}
        ]
    });

    $('#date_connected').datetimepicker();

    $("#country").change(function () {

        var id = $(this).val();
//        alert(id);
//        return;

        $.ajax(
                {
                    type: "POST",
                    url: base_url + '/lead/get_state',
                    data: {'id': id},
                    success: function (data)
                    {
                        $("#state").html('');
                        $("#state").html(data);
                        $("#state").select("val", "");
                    }

                });
    });


    $(document).on("click", ".delete", function () {
        var id = $(this).val();
        alert(id);
        return;
        swal({
            title: "Are you sure?",
            text: "You will not be able recover this record",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes delete it!",
            closeOnConfirm: false
        },
                function () {
                    $.ajax(
                            {
                                type: "POST",
                                url: base_url + 'library/branch_master/delete_branch',
                                data: {'id': id},
                                dataType: "text",
                                cache: false,
                                success: function (data)
                                {
                                    $(this).closest('tr').remove();
                                    swal({
                                        title: "Deleted",
                                        text: "Record has been deleted.",
                                        type: "success"
                                    },
                                            function () {
                                                location.reload();
                                            });
                                }
                            });
                });
    });


});