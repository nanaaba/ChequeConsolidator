@extends('layouts.master')

@section('content')

<div class="layout-content-body">

    <div class="text m-b">
        <h3 class="m-b-0"> Deposited Cheques</h3>
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
                <!--                 <h3 class="m-b-0">New Payment Cheque</h3>-->
                <form id="savechequeForm">
                    <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="region" class="control-label">Bank Name</label>
                                <input type="text" class="form-control" name="bank"  required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="region" class="control-label">Date Deposited:</label>
                                <div class="input-with-icon">

                                    <input class="form-control" type="text" name="deposited_date"  data-provide="datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy">
                                    <span class="icon icon-calendar input-icon"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="region" class="control-label">Clearing Date :</label>
                                <div class="input-with-icon">
                                    <input class="form-control" type="text" name="clearing_date"  data-provide="datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy">
                                    <span class="icon icon-calendar input-icon"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="region" class="control-label">Cheque Number:</label>
                                <input type="text" class="form-control" name="cheque_number"  required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="region" class="control-label">Cheque Type:</label>
                                <select class="form-control select2" name="cheque_type"  >
                                    <option value="">Select --</option>
                                    <option value="Post Dated">Post Dated</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="region" class="control-label">Cheque Narration:</label>
                                <input type="text" class="form-control" name="cheque_narrtion"  required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="region" class="control-label">Currency:</label>
                                <select class="form-control select2" name="currency"  required>
                                    <option value="">Select --</option>
                                    <option value="GHS">GHS</option>
                                    <option value="USD">USD</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="region" class="control-label">Amount:</label>
                                <input type="text" class="form-control" name="amount"  required>
                            </div>
                        </div>

                    </div>


                    <div class="row ">
                        <div class="col-md-4 pull-right">
                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                        </div>
                    </div>
                </form>
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
                        <table id="bankTbl" class="table table-middle nowrap">
                            <thead>
                                <tr>

                                    <th> Bank Name  </th>
                                    <th>Amount </th>
                                    <th>Cheque Number </th>
                                    <th> Narration </th>
                                    <th> Date Deposited</th>
                                    <th> Clearing Date </th>

                                    <th>Cheque Type</th>


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

<div class="modal fade" id="commodityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" >New Deposited Cheque</h4>
            </div>
            <form id="savechequeForm">
                <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

                <div class="modal-body">
                    <div class="form-group">
                        <label for="region" class="control-label">Bank Name</label>
                        <input type="text" class="form-control" name="bank"  required>
                    </div>
                    <div class="form-group">
                        <label for="region" class="control-label">Date Deposited:</label>
                        <input type="date" class="form-control datepicker" name="deposited_date"  required>
                    </div>

                    <div class="form-group">
                        <label for="region" class="control-label">Clearing Date :</label>
                        <input type="date" class="form-control datepicker" name="clearing_date"  required>
                    </div>
                    <div class="form-group">
                        <label for="region" class="control-label">Cheque Number:</label>
                        <input type="text" class="form-control" name="cheque_number"  required>
                    </div>
                    <div class="form-group ">
                        <label for="region" class="control-label">Cheque Type:</label>
                        <select class="form-control select2" name="cheque_type"  required>
                            <option value="">Select --</option>
                            <option value="Post Dated">Post Dated</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="region" class="control-label">Cheque Narration:</label>
                        <input type="text" class="form-control" name="cheque_narrtion"  required>
                    </div>

                    <div class="form-group ">
                        <label for="region" class="control-label">Currency:</label>
                        <select class="form-control select2" name="currency"  required>
                            <option value="">Select --</option>
                            <option value="GHS">GHS</option>
                            <option value="USD">USD</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="region" class="control-label">Amount:</label>
                        <input type="text" class="form-control" name="amount"  required>
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
                <h4 class="modal-title" id="exampleModalLabel">Update </h4>
            </div>
            <form id="updateCommodityForm" >
                <div class="modal-body">

                    <div class="form-group">
                        <label for="region" class="control-label">Name:</label>
                        <input type="text" class="form-control" name="name" id="commodityName" required>
                    </div>
                    <input type="hidden" class="form-control" name="type" value="updateInformation">

                    <input type="hidden" class="form-control" name="code" id="commodity_code">
                    <input type="hidden" class="form-control" name="tablename" value="commodites">


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
            <form method="post" id="deleteCommodityForm">
                <div class="modal-body">
                    <div>
                        <p>
                            Are you sure you want to delete this commodity?.<span class="holder" id="commodityholder"></span> 
                        </p>
                    </div>
                    <input type="hidden" id="code" name="code"/>
                    <input type="hidden"  name="type" value="deleteCommodity"/>


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

    $('#savechequeForm').on('submit', function (e) {
        e.preventDefault();
        // var validator = $("#saveRegionForm").validate();
        var formData = $(this).serialize();
        console.log(formData);
        $('input:submit').attr("disabled", true);
        $.ajax({
            url: "{{url('cheques/deposited')}}",
            type: "POST",
            data: formData,
            success: function (data) {
                console.log(data);
                $('#commodityModal').modal('hide');

                document.getElementById("savechequeForm").reset();

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
                    getBanks();
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
        url: "{{url('bank/all')}}",
        type: "GET",
        dataType: 'json',
        success: function (data) {

            console.log('data' + data);
            $.each(data, function (i, item) {

                $('#banks').append($('<option>', {
                    value: item.bank_name,
                    text: item.bank_name + '- ' + item.account_type + ' - ' + item.account_no
                }));
            });

        }
    });
    getCheques();

    function getCheques()
    {



        $.ajax({
            url: "{{url('cheques/getdeposits')}}",
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
                        r[++j] = '<td>' + value.receivingbank + '</td>';
                        r[++j] = '<td>' + value.currency + ' ' + value.amount + '</td>';
                        r[++j] = '<td>' + value.chequeno + '</td>';
                        r[++j] = '<td>' + value.narration + '</td>';
                        r[++j] = '<td>' + value.date_deposited + '</td>';
                        r[++j] = '<td>' + value.clearing_date + '</td>';
                        r[++j] = '<td>' + value.cheque_type + '</td>';

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

</script>
@endsection