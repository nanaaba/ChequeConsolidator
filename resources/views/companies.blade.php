@extends('layouts.master')

@section('content')

<div class="layout-content-body">

    <div class="text m-b">
        <h3 class="m-b-0">New Company</h3>
    </div>

    <div class="row">
        <div class="panel">
            <div class="panel-body">
                <form id="saveCompanyForm">
                    <div class="row">
                        <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="region" class="control-label">Company  Name:</label>
                                <input type="text" class="form-control" name="name"  required>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="region" class="control-label">Location:</label>
                                <input type="text" class="form-control" name="location"  required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="region" class="control-label"> Contact:</label>
                                <input type="text" class="form-control" name="contact"  required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="region" class="control-label"> Description(What company do):</label>
                                <textarea style="width: 100%" rows="5"  name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4 pull-right">
                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!--    <div class="row">
            <div class="col-xs-12">
                <div class="col-md-10 ">
    
                </div>
                <div class="col-md-2 ">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#commodityModal" data-whatever="@mdo"> New Bank</button>
                </div>
            </div>
        </div>-->

    <div style="margin-bottom:5px;">

    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-body">
                    <h3 class="m-b-0">Companies</h3>
                    <div class="table-responsive">
                        <table id="companyTbl" class="table table-middle nowrap">
                            <thead>
                                <tr>

                                    <th>Company Name  </th>
                                    <th>Location</th>
                                    <th>Description</th>
                                    <th>Contact</th>
                                    <th>Edit</th> 
                                    <th>Delete</th>

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


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">New User</h4>
            </div>
               <div class="modal-body">

                   <form id="updateCompanyForm">
                    <div class="row">
                        <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />
                        <input type="hidden" id="companyid" name="companyid"/>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label for="region" class="control-label">Company  Name:</label>
                                <input type="text" class="form-control" id="upname" name="name"  required>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="region" class="control-label">Location:</label>
                                <input type="text" class="form-control" id="uplocation" name="location"  required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="region" class="control-label"> Contact:</label>
                                <input type="text" class="form-control" id="upcontact" name="contact"  required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="region" class="control-label"> Description(What company do):</label>
                                <textarea style="width: 100%" rows="5" id="updescription"  name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4 pull-right">
                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                        </div>
                    </div>
                </form>
               </div>
        </div>
    </div>
</div>


<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" id="deleteCompanyForm">
                <div class="modal-body">
                    <div>
                        <p>
                            Are you sure you want to delete this Company?.<span class="holder" id="userholder"></span> 
                        </p>
                    </div>
                    <input type="hidden" id="upcompanyid" name="userid"/>

                    <input type="hidden" id="token" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />


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




@endsection
@section('customjs')
<script type="text/javascript">

    var datatable = $('#companyTbl').DataTable();
    $('#saveCompanyForm').on('submit', function (e) {
        e.preventDefault();
        // var validator = $("#saveRegionForm").validate();
        var formData = $(this).serialize();
        console.log(formData);
        $('input:submit').attr("disabled", true);
        $.ajax({
            url: "{{url('companies/savecompany')}}",
            type: "POST",
            data: formData,
            success: function (data) {
                console.log(data);
                $('#commodityModal').modal('hide');

                document.getElementById("saveCompanyForm").reset();

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
                    getCompanies();
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

    getCompanies();
    function getCompanies()
    {



        $.ajax({
            url: "{{url('companies/all')}}",
            type: "GET",
            dataType: "json",
            success: function (data) {

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
                        r[++j] = '<td>' + value.location + '</td>';
                        r[++j] = '<td>' + value.description + '</td>';
                        r[++j] = '<td>' + value.contact + '</td>';
                        r[++j] = '<td>\n\
                       <button onclick="editCompany(\'' + value.id + '\')" class="btn btn-outline-info btn-sm editBtn"  type="button">Edit</button>\n\
                         </td>';
                        r[++j] = '<td>\n\           <button onclick="deleteCompnay(\'' + value.id + '\',\'' + value.name + '\')" class="btn btn-outline-danger btn-sm editBtn"  type="button">Delete</button>\n\
                       </td>';
                        rowNode = datatable.row.add(r);
                    });

                    rowNode.draw().node();
                }

            },
            error: function (jXHR, textStatus, errorThrown) {
                swal("Error!", "Error", "error");
            }
        });
    }


    function editCompany(id) {


        $.ajax({
            url:  'companies/'+id,
            type: "GET",
            dataType: 'json',
            success: function (data) {
                
                console.log(data);
                $("#usergroups  option[value='']").prop("selected", true);

                
                var name = data[0].name;
                var location = data[0].location;
                var contact = data[0].contact;
                var description = data[0].description;
                var id = data[0].id;
                $('#upname').val(name);
                $('#companyid').val(id);
                $('#uplocation').val(location);
                $('#upcontact').val(contact);
                $('#updescription').val(description);

                $('#editModal').modal('show');


            }
        });

    }



    $('#updateCompanyForm').on('submit', function (e) {
        e.preventDefault();

        var formData = $(this).serialize();
        console.log(formData);
        $('input:submit').attr("disabled", true);

        $.ajax({
            url: "{{url('companies/updatecompany')}}",
            type: "PUT",
            data: formData,
            success: function (data) {
                $('input:submit').attr("disabled", false);
                console.log('server details:' + data);
                $('#editModal').modal('hide');

                if (data == 0) {
                    Command: toastr["success"]("Data updated successfully", "Success");

                    getCompanies();
                } else {
                    Command: toastr["error"]("Couldnt update data", "Error");

                }
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


            },
            error: function (jXHR, textStatus, errorThrown) {
                swal("Error!", "Contact Systen Administrator", "error");
            }
        });




    });



    function deleteCompnay(code, title) {



        $('#upcompanyid').val(code);
        $('#userholder').html(title);
        $('#confirmModal').modal('show');
    }


    $('#deleteCompanyForm').on('submit', function (e) {
        e.preventDefault();
        $('input:submit').attr("disabled", true);
        var code = $('#upcompanyid').val();
        var token = $('#token').val();
        $('#confirmModal').modal('hide');
        $('#loaderModal').modal('show');

        $.ajax({
            url: 'companies/' + code,
            type: "DELETE",
            data: {_token: token},
            success: function (data) {
                // $("#loader").hide();
                $('input:submit').attr("disabled", false);
                $('#loaderModal').modal('hide');
                if (data == 0) {
                    Command: toastr["success"]("Deleted successfully", "Success");

                    getCompanies();
                } else {
                    Command: toastr["error"]("Couldnt delete", "Error");

                }
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
            },
            error: function (jXHR, textStatus, errorThrown) {
                swal("Error!", "Contact Systen Administrator", "error");
            }
        });

    });


</script>
@endsection