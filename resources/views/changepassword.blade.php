@extends('layouts.master')

@section('content')


<div class="layout-content-body">
    <div class="row gutter-xs">
        <div class="card">
            <div class="card-header">
                <strong>Change Password</strong>
            </div>
            <div class="card-body">
                <form id="changePasswordForm">
                    <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label class="control-label"> New Password</label>
                            <input  class="form-control" type="password" name="password" id="password" required>
                            <small class="help-block"></small>
                        </div>
                        <div class="form-group">
                            <label  class="control-label">Confirm Password</label>
                            <input  class="form-control" type="password" name="confirm_password" id="confirm_password" required>
                            <small class="help-block"></small>
                        </div> 



                    </div>
                    <div class="col-xs-12">
                        <input type="hidden" value="changePassword" name="type"/>
                        <br><br>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-sm-offset-3 col-sm-6 col-md-offset-6 col-md-6">

                            <button class="btn btn-primary  btn-block pull-right" type="submit">Update Password</button>
                        </div>
                    </div>
                </form>

            </div>
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
@endsection
@section('customjs')
<script type="text/javascript">



    $('#changePasswordForm').on('submit', function (e) {
        e.preventDefault();


        var formData = $(this).serialize();
        console.log(formData);

        $('input:submit').attr("disabled", true);
        $('#loaderModal').modal('show');

        var password = $('#password').val();
        var confirmpassword = $('#confirm_password').val();

        if (password == confirmpassword)
        {
            $.ajax({
                url: "{{url('account/updatepassword')}}",
                type: "POST",
                data: formData,
                success: function (data) {
                    console.log(data);
                    $('#loaderModal').modal('hide');

                    document.getElementById("changePasswordForm").reset();


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
                        getBanks();
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
                                        $('#loaderModal').modal('hide');

                    Command: toastr["error"]("Contact Administrator", "Error");

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
            });

        } else {
                                $('#loaderModal').modal('hide');

            Command: toastr["error"]("Password Mismatch", "Error");

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

    });

</script>
@endsection