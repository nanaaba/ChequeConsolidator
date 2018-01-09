<?php $__env->startSection('content'); ?>

<div class="layout-content-body">

    <div class="text m-b">
        <h3 class="m-b-0">User Groups</h3>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="col-md-10 ">

            </div>
            <div class="col-md-2 ">
                <button type="button" class="btn btn-primary" id="createUserGroupBtn"  data-toggle="modal" data-target="#userGroupModal" data-whatever="@mdo"> New User Group</button>
            </div>
        </div>
    </div>

    <div style="margin-bottom:5px;">

    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="usergroupsTbl" class="table table-middle nowrap">
                            <thead>
                                <tr>

                                    <th>Name</th>


                                    <th>Edit </th>


                                    <th>Delete </th>

                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="userGroupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">New User Group</h4>
            </div>
            <form id="saveUserGroupForm" method="POST" >
                <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

                <div class="modal-body">

                    <div class="form-group">
                        <label  class="control-label">Name:</label>
                        <input type="text" class="form-control" name="name" id="usergroup" required>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Update User Group</h4>
            </div>
            <form id="updateUserGroupForm" >
                <div class="modal-body">
                <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

                    <div class="form-group">
                        <label for="region" class="control-label">Name:</label>
                        <input type="text" class="form-control" name="name" id="usergroupdetail" required>
                    </div>

                    <input type="hidden" class="form-control" name="usergroupid" id="code">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" id="deleteUserGroupForm">
                <div class="modal-body">
                    <div>
                        <p>
                            Are you sure you want to delete this User Group?.<span class="holder" id="regionholder"></span> 
                        </p>
                    </div>
                                    <input type="hidden" id="token" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

                    <input type="hidden" id="groupid" name="groupid"/>
                    <input type="hidden" id="usergroupname" name="usergroupname"/>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type="submit"  class="btn btn-primary">YES</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="loaderModal" data-keyboard="false" data-backdrop="static" role="dialog" >
    <div class="modal-dialog" role="document">


        <div  id="loader" style="margin-top:30% ">
            <i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i>
            <span class="loader-text">Wait...</span>
        </div>


    </div>
</div>




<?php $__env->stopSection(); ?>
<?php $__env->startSection('customjs'); ?>
<script type="text/javascript">

//save regio


//retreive regions

    var datatable = $('#usergroupsTbl').DataTable({
        responsive: true,
        language: {
            paginate:
                    {previous: "&laquo;", next: "&raquo;"},
            search: "_INPUT_",
            searchPlaceholder: "Search…"
        },
        order: [[0, "asc"]]
    });

    getUserGroups();

    function getUserGroups()
    {

        $.ajax({
            url: "<?php echo e(url('account/getusergroups')); ?>",
            type: "GET",
            dataType: "json",
            success: function (data) {
                // alert(data);
                console.log(data);
                datatable.clear().draw();

                if (data.length == 0) {
                    console.log("NO DATA!");
                } else {
                    $.each(data, function (key, value) {


                        var j = -1;
                        var r = new Array();
                        // represent columns as array
                        r[++j] = '<td>' + value.name + '</td>';
                        r[++j] = '<td><button onclick="editUserGroup(\'' + value.id + '\',\'' + value.name + '\')"  class="btn btn-outline-info btn-sm editBtn" type="button">Edit</button></td>';
                        r[++j] = '<td><button onclick="deleteUserGroup(\'' + value.id + '\',\'' + value.name + '\')"  class="btn btn-outline-danger btn-sm deleteBtn" type="button">Delete</button></td>';

                        rowNode = datatable.row.add(r);
                    });

                    rowNode.draw().node();
                }

            },
            error: function (jXHR, textStatus, errorThrown) {
                alert(errorThrown + " " + textStatus + " New Error: " + jXHR);
            }
        });


    }










    $('#saveUserGroupForm').on('submit', function (e) {
        e.preventDefault();
        // var validator = $("#saveRegionForm").validate();
        var formData = $(this).serialize();
        console.log(formData);
        $('input:submit').attr("disabled", true);
        $.ajax({
            url: "<?php echo e(url('account/usergroup')); ?>",
            type: "POST",
            data: formData,
            success: function (data) {
                console.log(data);
                $('#userGroupModal').modal('hide');

                document.getElementById("saveUserGroupForm").reset();

                if (data == 0) {

                    Command: toastr["success"]("Data Saved Successfully", "Success");

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    getUserGroups();
                } else {
                    Command: toastr["error"](data, "Error");

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }
            },
            error: function (jXHR, textStatus, errorThrown) {
                swal("Error!", "Couldnt save:Duplicate entry,name already exist", "error");
            }
        });




    });


    function editUserGroup(id, name) {
        //alert('goood');
        $('#code').val(id);
        $('#usergroupdetail').val(name);
        $('#editModal').modal('show');
    }


    function deleteUserGroup(code, title) {
        console.log(code + title);
        $('#groupid').val(code);
        $('#regionholder').html(title);
        $('#usergroupname').val(title);
        $('#confirmModal').modal('show');
    }


 $('#deleteUserGroupForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var code = $('#groupid').val();
    var token = $('#token').val();
    $('#confirmModal').modal('hide');
    $('#loaderModal').modal('show');

    $.ajax({
        url: 'usergroup/' + code,
        type: "DELETE",
        data: {_token: token},
        success: function (data) {
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');

            document.getElementById("deleteUserGroupForm").reset();

            if (data == 0) {
                  Command: toastr["success"]("Deleted Successfully", "Success");

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                getUserGroups();
            } else {
                Command: toastr["error"]("Couldnt Delete", "Error");

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
           swal("Error!", "Couldnt Delete", "error");
        }
    });

});


    $('#updateUserGroupForm').on('submit', function (e) {
        e.preventDefault();
        $('input:submit').attr("disabled", true);
        var formData = $(this).serialize();
        console.log(formData);
        $('#editModal').modal('hide');
        $('#loaderModal').modal('show');

        $.ajax({
           url: "<?php echo e(url('account/usergroup')); ?>",
            type: "PUT",
            data: formData,
            success: function (data) {
                // $("#loader").hide();
                $('input:submit').attr("disabled", false);
                $('#loaderModal').modal('hide');

                if (data == 0) {
                    Command: toastr["success"]("Data Updated Successfully", "Success");

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    getUserGroups();
                }
            },
            error: function (jXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });

    });


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>