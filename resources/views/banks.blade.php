@extends('layouts.master')

@section('content')

<div class="layout-content-body">

    <div class="text m-b">
        <h3 class="m-b-0">New Bank</h3>
    </div>

    <div class="row">
        <div class="panel">
            <div class="panel-body">
                <form id="saveBankForm">
                    <div class="row">
                        <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="region" class="control-label">Bank  Name:</label>
                                <input type="text" class="form-control" name="bank_name"  required>
                            </div>
                        </div>

                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="region" class="control-label"> Account Number:</label>
                                <input type="text" class="form-control" name="account_number"  required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="region" class="control-label">Account Type:</label>
                                <select class="form-control select2" name="account_type"  required>
                                    <option value="">Select --</option>
                                    <option value="Savings">Savings</option>
                                    <option value="Current">Current</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="region" class="control-label"> Currency:</label>
                                <select class="form-control select2" name="currency"  required>
                                    <option value="">Select --</option>
                                    <option value="GHS">GHS</option>
                                    <option value="USD">USD</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="region" class="control-label">Branch:</label>
                                <input type="text" class="form-control" name="branch"  required>
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
                                <label for="region" class="control-label">Relationship Officer:</label>
                                <input type="text" class="form-control" name="relationship_officer"  required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="region" class="control-label">Relationship Contact:</label>
                                <input type="text" class="form-control" name="relationship_contact"  required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="region" class="control-label">Company:</label>
                                <select class="form-control select2 companies" name="company" id="companies"  required>
                                    <option value="">Select --</option>

                                </select>
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
                    <h3 class="m-b-0">Banks</h3>
                    <div class="table-responsive">
                        <table id="bankTbl" class="table table-middle nowrap">
                            <thead>
                                <tr>
                                    <th>Company  </th>
                                    <th>Bank  </th>
                                    <th>Account Number</th>
                                    <th>Account Type</th>
                                    <th>Branch</th>
                                    <th>Relationship Officer </th>
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
                <h4 class="modal-title" id="exampleModalLabel">Update </h4>
            </div>
            <div class="modal-body">

                <form id="updateBankForm">
                    <div class="row">
                        <input type="hidden" name="id" id="upbank_id"/>
                        <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="region" class="control-label">Bank  Name:</label>
                                <input type="text" class="form-control" id="upbank_name" name="bank_name"  required>
                            </div>
                        </div>

                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="region" class="control-label"> Account Number:</label>
                                <input type="text" class="form-control" id="upaccount_number" name="account_number"  required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="region" class="control-label">Account Type:</label>
                                <select class="form-control select2" id="upaccount_type" name="account_type"  required>
                                    <option value="">Select --</option>
                                    <option value="Savings">Savings</option>
                                    <option value="Current">Current</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="region" class="control-label"> Currency:</label>
                                <select class="form-control select2" id="upcurrency" name="currency"  required>
                                    <option value="">Select --</option>
                                    <option value="GHS">GHS</option>
                                    <option value="USD">USD</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="region" class="control-label">Branch:</label>
                                <input type="text" class="form-control" id="upbranch" name="branch"  required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="region" class="control-label">Location:</label>
                                <input type="text" class="form-control" name="location" id="uplocation"  required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="region" class="control-label">Relationship Officer:</label>
                                <input type="text" class="form-control" name="relationship_officer" id="uprelationship_officer"  required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="region" class="control-label">Relationship Contact:</label>
                                <input type="text" class="form-control" name="relationship_contact" id="uprelationship_contact"  required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="region" class="control-label">Company:</label>
                                <select class="form-control select2 companies" name="company" id="upcompany_id"  required>
                                    <option value="">Select --</option>

                                </select>
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
            <form method="post" id="deleteBankForm">
                <input type="hidden" class="form-control form-control-lg input-lg" id="token"  name="_token" value="<?php echo csrf_token() ?>" />

                <div class="modal-body">
                    <div>
                        <p>
                            Are you sure you want to delete?.<span class="holder" id="commodityholder"></span> 
                        </p>
                    </div>
                    <input type="hidden" id="upbnkid" name="code"/>


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

    var datatable = $('#bankTbl').DataTable();
    $('#saveBankForm').on('submit', function (e) {
        e.preventDefault();
        // var validator = $("#saveRegionForm").validate();
        var formData = $(this).serialize();
        console.log(formData);
        $('input:submit').attr("disabled", true);
        $.ajax({
            url: "{{url('banks/savebank')}}",
            type: "POST",
            data: formData,
            success: function (data) {
                console.log(data);
                $('#commodityModal').modal('hide');

                document.getElementById("saveBankForm").reset();

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
                swal("Error!", "Couldnt save:Duplicate entry,name already exist", "error");
            }
        });




    });

    getBanks();
    function getBanks()
    {



        $.ajax({
            url: "{{url('bank/all')}}",
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
                        r[++j] = '<td>' + value.company_name + '</td>';
                        r[++j] = '<td>' + value.bank_name + '</td>';
                        r[++j] = '<td>' + value.account_no + '</td>';
                        r[++j] = '<td>' + value.account_type + '</td>';
                        r[++j] = '<td>' + value.branch + '</td>';
                        r[++j] = '<td>' + value.relationship_officer + '</td>';
                        r[++j] = '<td>\n\
                       <button onclick="editBank(\'' + value.id + '\')" class="btn btn-outline-info btn-sm editBtn"  type="button">Edit</button>\n\
                         </td>';
                        r[++j] = '<td>\n\           <button onclick="deleteBank(\'' + value.id + '\')" class="btn btn-outline-danger btn-sm editBtn"  type="button">Delete</button>\n\
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


    $.ajax({
        url: "{{url('companies/all')}}",
        type: "GET",
        dataType: 'json',
        success: function (data) {

            console.log('data' + data);
            $.each(data, function (i, item) {

                $('.companies').append($('<option>', {
                    value: item.id,
                    text: item.name
                }));
            });

        }
    });

    function editBank(id) {


        $.ajax({
            url: 'bank/' + id,
            type: "GET",
            dataType: 'json',
            success: function (data) {

                console.log(data);
                $("#usergroups  option[value='']").prop("selected", true);


                var bank_name = data[0].bank_name;
                var branch = data[0].branch;
                var company_id = data[0].company_id;
                var currency = data[0].currency;
                var relationship_contact = data[0].relationship_contact;
                var relationship_officer = data[0].relationship_officer;
                var account_no = data[0].account_no;
                var account_type = data[0].account_type;
                var location = data[0].location;

                var id = data[0].id;


                $('#upbank_id').val(id);
                $('#upbank_name').val(bank_name);
                $('#upbranch').val(branch);
                $('#uprelationship_contact').val(relationship_contact);
                $('#uprelationship_officer').val(relationship_officer);
                $('#upaccount_number').val(account_no);
                $('#uplocation').val(location);

                $("#upcompany_id  option[value=" + company_id + "]").prop("selected", true);
                $("#upcurrency  option[value=" + currency + "]").prop("selected", true);
                $("#upaccount_type  option[value=" + account_type + "]").prop("selected", true);

                $("#upcompany_id ").change();
                $("#upcurrency ").change();
                $("#upaccount_type ").change();
                $('#editModal').modal('show');


            }
        });

    }



    $('#updateBankForm').on('submit', function (e) {
        e.preventDefault();

        var formData = $(this).serialize();
        console.log(formData);
        $('input:submit').attr("disabled", true);

        $.ajax({
            url: "{{url('bank/updatecompanybank')}}",
            type: "PUT",
            data: formData,
            success: function (data) {
                $('input:submit').attr("disabled", false);
                console.log('server details:' + data);
                $('#editModal').modal('hide');

                if (data == 0) {
                    Command: toastr["success"]("Data updated successfully", "Success");

                    getBanks();
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



    function deleteBank(code) {



        $('#upbnkid').val(code);
        $('#confirmModal').modal('show');
    }


    $('#deleteBankForm').on('submit', function (e) {
        e.preventDefault();
        $('input:submit').attr("disabled", true);
        var code = $('#upbnkid').val();
        var token = $('#token').val();
        $('#confirmModal').modal('hide');
        $('#loaderModal').modal('show');

        $.ajax({
            url: 'bank/companybank/' + code,
            type: "DELETE",
            data: {_token: token},
            success: function (data) {
                // $("#loader").hide();
                $('input:submit').attr("disabled", false);
                $('#loaderModal').modal('hide');
                if (data == 0) {
                    Command: toastr["success"]("Deleted successfully", "Success");

                    getBanks();
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