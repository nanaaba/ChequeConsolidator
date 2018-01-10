@extends('layouts.master')

@section('content')

<div class="layout-content-body">

    <div class="text m-b">
        <h3 class="m-b-0">Report</h3>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-body">

                    <form id="chequeForm" >
                        <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />


                        <div class="form-group col-sm-6">
                            <label for="region" class="control-label">Type:</label>
                            <select class="form-control select2" name="cheque_type" required>
                                <option value="">Select --</option>
                                <option value="debit">Withdrawal</option>
                                <option value="credit">Deposit</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="region" class="control-label">Cheque No:</label>
                            <input type="text" class="form-control" name="cheque_no"  required>
                        </div>

                        <br><br>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </form>
                </div>
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
                        <table id="chequeTbl" class="table table-middle nowrap">
                            <thead>
                                <tr>

                                    <th>  Bank </th>

                                    <th>Cheque Number </th>
                                    <th> Narration </th>
                                    <th>Amount</th>
                                    <th>Action</th>


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

<div class="modal fade" id="chequeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Detail</h4>
            </div>

            <div class="modal-body">

                <form id="statusForm">
                    <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />
                    <input type="hidden" class="form-control form-control-lg input-lg"  name="cheque_id" id="cheque_id" />

                    <div class="form-group">
                        <label for="region" class="control-label">Status:</label>
                        <select class="form-control select2" name="status" required>
                            <option value="">Select --</option>
                            <option value="Bounced">Bounced</option>
                            <option value="Cleared">Cleared</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="region" class="control-label">Date :</label>
                        <input class="form-control" type="text" name="date"  data-provide="datepicker" data-date-autoclose="true" data-date-format="yyyy-mm-dd">
                    </div>

                    <div class="row ">
                        <div class="col-md-4 pull-right">
                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                        </div>
                    </div>
                </form>
            </div>


            <div class="card" id="loanhistorydiv">
                <div class="card-body">
                    <h4>Status History</h4>
                    <div class="row">
                        <div class=" col-lg-12 ">

                            <div class="table-responsive">
                                <table id="statusTbl" class="table table-middle nowrap">
                                    <thead>
                                        <tr>
                                            <th>Status </th>
                                            <th>Date</th>

                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>


                        </div>
                    </div>

                </div>
            </div>



            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

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

    var datatable = $('#chequeTbl').DataTable();
//statusTbl
    var statusdatatable = $('#statusTbl').DataTable();
//chequeModal
    $('#chequeForm').on('submit', function (e) {
        e.preventDefault();
        // var validator = $("#saveRegionForm").validate();
        var formData = $(this).serialize();
        console.log(formData);
        $('input:submit').attr("disabled", true);
        $.ajax({
            url: "{{url('cheques/information')}}",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function (data) {
                console.log(data);
                $('#commodityModal').modal('hide');
                datatable.clear().draw();

                if (data.length == 0) {
                    console.log("NO DATA!");
                } else {
                    $.each(data, function (key, value) {


                        var j = -1;
                        var r = new Array();
                        // represent columns as array
                        r[++j] = '<td>' + value.bank_name + '</td>';
                        r[++j] = '<td>' + value.chequeno + '</td>';
                        r[++j] = '<td>' + value.narration + '</td>';
                        r[++j] = '<td>' + value.amount + '</td>';
                        r[++j] = '<td><button class="btn btn-outline-primary btn-sm btn-edit" onclick="getCheckStatuses(' + value.id + ')"><i class="fa fa-eye" "=""></i><span class="hidden-md hidden-sm hidden-xs">View </span></button></td>';
                        rowNode = datatable.row.add(r);
                    });

                    rowNode.draw().node();
                }

            },
            error: function (jXHR, textStatus, errorThrown) {
                swal("Error!", "Contact Administrator", "error");
            }
        });




    });


    function getCheckStatuses(id) {
        $('#cheque_id').val(id);
        chequeStatus(id);
        $('#chequeModal').modal('show');
    }


    $('#statusForm').on('submit', function (e) {
        e.preventDefault();
        // var validator = $("#saveRegionForm").validate();
        var formData = $(this).serialize();
        console.log(formData);
        $('input:submit').attr("disabled", true);
        $.ajax({
            url: "{{url('cheques/savestatus')}}",
            type: "POST",
            data: formData,
            success: function (data) {
                console.log(data);
                $('#chequeModal').modal('hide');

                document.getElementById("statusForm").reset();

                if (data == 0) {
                    //getChequeStatus(c);
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
                    //   getBanks();
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

    function chequeStatus(chequeid) {
        $.ajax({
            url: "cheques/statuses/" + chequeid,
            type: "GET",
            dataType: "json",
            success: function (data) {
                console.log(data);
                statusdatatable.clear().draw();

                if (data.length == 0) {
                    console.log("NO DATA!");
                } else {
                    $.each(data, function (key, value) {


                        var j = -1;
                        var r = new Array();
                        // represent columns as array
                        r[++j] = '<td>' + value.status + '</td>';
                        r[++j] = '<td>' + value.date + '</td>';
                        rowNode = statusdatatable.row.add(r);
                    });

                    rowNode.draw().node();
                }

            },
            error: function (jXHR, textStatus, errorThrown) {
                swal("Error!", "Contact Administrator", "error");
            }
        });

    }

</script>


@endsection