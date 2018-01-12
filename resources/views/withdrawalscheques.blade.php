@extends('layouts.master')

@section('content')

<div class="layout-content-body">

    <?php
    $permissions = Session::get('permissions');

    if (in_array("ADD_WITHDRAWAL_CHEQUE", $permissions)) {
        ?> 
        <div class="text m-b">
            <h4 class="m-b-0"> New Withdrawal Cheque</h4>
        </div>

        <!--    <div class="row">
                <div class="col-xs-12">
                    <div class="col-md-10 ">
        
                    </div>
                    <div class="col-md-2 ">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#commodityModal" data-whatever="@mdo"> New Cheque</button>
                    </div>
                </div>
            </div>-->

        <div class="row">
            <div class="panel">
                <div class="panel-body">
                    <!--                 <h4 class="m-b-0">New Payment Cheque</h4>-->
                    <form id="savechequeForm">
                        <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="region" class="control-label">Company:</label>
                                <select class="form-control select2" name="company_id" id="companies"  required>
                                    <option value="">Select --</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="region" class="control-label">Bank:</label>
                                <select class="form-control select2 " name="bank" id="banks" required>
                                    <option value="">Loading --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="region" class="control-label">Name on the cheque (Who’s been paid)</label>
                                <input type="text" class="form-control" name="receiver_name"  required>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <label for="region" class="control-label">Date of Payment (Issuing Date on the cheque):</label>

                            <div class="input-with-icon">

                                <input class="form-control" type="text" name="issue_date"  data-provide="datepicker" data-date-autoclose="true" data-date-format="yyyy-mm-dd">
                                <span class="icon icon-calendar input-icon"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="region" class="control-label">Cheque Number:</label>
                                <input type="text" class="form-control" name="cheque_number"  required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="region" class="control-label">Cheque Narration:</label>
                                <input type="text" class="form-control"  name="cheque_narrtion"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="region" class="control-label">Amount:</label>
                                <input type="text" class="form-control" name="amount"  required>
                            </div>
                        </div>




                        <div class="row col-md-4 pull-right">
                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
    }
    ?>

    <div style="margin-bottom:5px;">

    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-body">
                    <h4 class="m-b-0">  Withdrawal Cheques</h4>

                    <div class="table-responsive">
                        <table id="bankTbl" class="table table-middle nowrap">
                            <thead>
                                <tr>
                                    <th> Company </th>
                                    <th> Issuing Bank </th>

                                    <th> Issue Date  </th>
                                    <th>Receiver Name </th>


                                    <th>Cheque Number </th>
                                    <th> Narration </th>
                                    <th>Amount</th>
                                    <?php
                                    if (in_array("EDIT_CHEQUE", $permissions)) {
                                        ?>  
                                        <th>Edit</th> 
                                        <?php
                                    }
                                    if (in_array("DELETE_CHEQUE", $permissions)) {
                                        ?>  

                                        <th>Delete</th>
                                        <?php
                                    }
                                    ?>

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


<div class="modal fade" id="loaderModal" data-keyboard="false" data-backdrop="static" role="dialog" >
    <div class="modal-dialog" role="document">


        <div  id="loader" style="margin-top:30% ">
            <i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i>
            <span class="loader-text">Wait...</span>
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

                <form id="updateChqForm">
                    <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

                    <input type="hidden" id="chqid" name="id"/>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="region" class="control-label">Name on the cheque (Who’s been paid)</label>
                            <input type="text" class="form-control" name="receiver_name" id="upreceiver_name"  required>
                        </div>
                        <div class="form-group">
                            <label for="region" class="control-label">Date of Payment (Issuing Date on the cheque):</label>
                            <div class="input-with-icon">

                                <input class="form-control" type="text" name="issue_date" id="upissue_date" data-provide="datepicker" data-date-autoclose="true" data-date-format="yyyy-mm-dd">
                                <span class="icon icon-calendar input-icon"></span>
                            </div>
                        </div>



                        <div class="form-group ">
                            <label for="region" class="control-label">Bank:</label>
                            <select class="form-control select2 " name="bank" id="upbankss"  required>
                                <option value="">Select --</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="region" class="control-label">Cheque Number:</label>
                            <input type="text" class="form-control" name="cheque_number" id="upcheque_number"  required>
                        </div>
                        <div class="form-group">
                            <label for="region" class="control-label">Cheque Narration:</label>
                            <input type="text" class="form-control" name="cheque_narrtion" id="upcheque_narrtion"  required>
                        </div>

                        <div class="form-group">
                            <label for="region" class="control-label">Amount:</label>
                            <input type="text" class="form-control" name="amount" id="upamount"  required>
                        </div>
                        <div class="form-group">
                            <label for="region" class="control-label">Reason for updating:</label>

                            <input type="text" class="form-control" name="reason"   required>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" id="deleteChqForm">
                <input type="hidden" class="form-control form-control-lg input-lg" id="token"  name="_token" value="<?php echo csrf_token() ?>" />

                <div class="modal-body">
                    <div>
                        <p>
                            Are you sure you want to delete?.<span class="holder" id="commodityholder"></span> 
                        </p>
                    </div>
                    <input type="hidden" id="upchqid" name="code"/>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type="submit"  class="btn btn-primary">YES</button>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection
@section('customjs')
<script type="text/javascript">

    var datatable = $('#bankTbl').DataTable();

    $('#savechequeForm').on('submit', function (e) {
        e.preventDefault();
        // var validator = $("#saveRegionForm").validate();
        var formData = $(this).serialize();
        console.log(formData);
        $('input:submit').attr("disabled", true);
        $.ajax({
            url: "{{url('cheques/issued')}}",
            type: "POST",
            data: formData,
            success: function (data) {
                console.log(data);
                $('#commodityModal').modal('hide');

                document.getElementById("savechequeForm").reset();
                $('#banks').val("");
                $('#banks').change();
                $('#companies').val("");
                $('#companies').change();
                if (data == 0) {
                    getCheques();
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
                } else {
                    Command: toastr["error"]("Couldnt Save", "Error");

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

    $.ajax({
        url: "{{url('companies/all')}}",
        type: "GET",
        dataType: 'json',
        success: function (data) {

            console.log('data' + data);
            $.each(data, function (i, item) {

                $('#companies').append($('<option>', {
                    value: item.id,
                    text: item.name
                }));
            });

        }
    });

    $('#companies').change(function () {

        var company_id = $(this).val();
        console.log('company id :' + company_id);
        getCompanyBanks(company_id);
    });

    function getCompanyBanks(companyid) {
        $.ajax({
            url: "../companies/banks/" + companyid,
            type: "GET",
            dataType: 'json',
            success: function (data) {
                $('#banks').html("");
                $('#banks').append('<option value="">Select --</option>');
                console.log('data' + data);
                $.each(data, function (i, item) {

                    $('#banks').append($('<option>', {
                        value: item.id,
                        text: item.bank_name + '- ' + item.account_type + ' - ' + item.account_no
                    }));
                });

            }
        });
    }


    getCheques();

    function getCheques()
    {



        $.ajax({
            url: "{{url('cheques/getpayments')}}",
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
                        r[++j] = '<td>' + value.issue_date + '</td>';
                        r[++j] = '<td>' + value.beneficiary_name + '</td>';

                        r[++j] = '<td>' + value.chequeno + '</td>';
                        r[++j] = '<td>' + value.narration + '</td>';
                        r[++j] = '<td>' + value.amount + '</td>';
                        r[++j] = '<td>\n\
                       <button onclick="editCheque(\'' + value.id + '\')" class="btn btn-outline-info btn-sm editBtn"  type="button">Edit</button>\n\
                         </td>';
                        r[++j] = '<td>\n\           <button onclick="deleteCheque(\'' + value.id + '\',\'' + value.name + '\')" class="btn btn-outline-danger btn-sm editBtn"  type="button">Delete</button>\n\
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


    function editCheque(id) {


        $.ajax({
            url: id,
            type: "GET",
            dataType: 'json',
            success: function (data) {


                console.log(data);
                $("#upbankss  option[value='']").prop("selected", true);

//                $('.banks').html("");
//                $('.banks').append('<option value="">Select --</option>');
                var amount = data[0].amount;
                var bank = data[0].bank;
                var beneficiary_name = data[0].beneficiary_name;
                var chequeno = data[0].chequeno;
                var narration = data[0].narration;
                var transaction_date = data[0].transaction_date;
                var id = data[0].id;
                var company_id = data[0].company_id;

                $.when(getCompanyBank(company_id)).done(function (response) {
                    console.log('data' + response);
                    $.each(response, function (i, item) {

                        $('#upbankss').append($('<option>', {
                            value: item.id,
                            text: item.bank_name + '- ' + item.account_type + ' - ' + item.account_no
                        }));
                    });

                    $('#chqid').val(id);
                    $('#upreceiver_name').val(beneficiary_name);
                    $('#upcheque_number').val(chequeno);
                    $('#upcheque_narrtion').val(narration);
                    $('#upissue_date').val(transaction_date);
                    $('#upamount').val(amount);

                    $("#upbankss  option[value=" + bank + "]").prop("selected", true);

                    $("#upbankss").change();
                    $('#editModal').modal('show');
                });





            }
        });

    }



    $('#updateChqForm').on('submit', function (e) {
        e.preventDefault();

        var formData = $(this).serialize();
        console.log(formData);
        $('input:submit').attr("disabled", true);

        $.ajax({
            url: "{{url('cheques/updatedwithdrawalcheque')}}",
            type: "PUT",
            data: formData,
            success: function (data) {
                $('input:submit').attr("disabled", false);
                console.log('server details:' + data);
                $('#editModal').modal('hide');

                if (data == 0) {
                    Command: toastr["success"]("Data updated successfully", "Success");

                    getCheques();
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



    function deleteCheque(code) {



        $('#upchqid').val(code);
        $('#confirmModal').modal('show');
    }


    $('#deleteChqForm').on('submit', function (e) {
        e.preventDefault();
        $('input:submit').attr("disabled", true);
        var code = $('#upchqid').val();
        var token = $('#token').val();
        $('#confirmModal').modal('hide');
        $('#loaderModal').modal('show');

        $.ajax({
            url: code,
            type: "DELETE",
            data: {_token: token},
            success: function (data) {
                // $("#loader").hide();
                $('input:submit').attr("disabled", false);
                $('#loaderModal').modal('hide');
                if (data == 0) {
                    Command: toastr["success"]("Deleted successfully", "Success");

                    getCheques();
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


    function getCompanyBank(companyid) {



        return    $.ajax({
            url: "../companies/banks/" + companyid,
            type: "GET",
            dataType: 'json'

        });
    }



</script>
@endsection