@extends('layouts.master')

@section('content')

<div class="layout-content-body">

    <div class="text m-b">
        <h3 class="m-b-0">Banks</h3>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="col-md-10 ">

            </div>
            <div class="col-md-2 ">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#commodityModal" data-whatever="@mdo"> New Bank</button>
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

                                    <th>Bank  </th>
                                    <th>Account Number</th>
                                    <th>Account Type</th>
                                    <th>Branch</th>
                                    <th>Relationship Officer </th>


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
                <h4 class="modal-title" >New Bank</h4>
            </div>
            <form id="saveBankForm">
                <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

                <div class="modal-body">
                    <div class="form-group">
                        <label for="region" class="control-label">Bank  Name:</label>
                        <input type="text" class="form-control" name="bank_name"  required>
                    </div>
                    <div class="form-group">
                        <label for="region" class="control-label">Bank Account Name:</label>
                        <input type="text" class="form-control" name="account_name"  required>
                    </div>
                    <div class="form-group">
                        <label for="region" class="control-label"> Account Number:</label>
                        <input type="text" class="form-control" name="account_number"  required>
                    </div>
                    <div class="form-group">
                        <label for="region" class="control-label"> Account Type:</label>
                        <input type="text" class="form-control" name="account_type"  required>

                    </div>
                    <div class="form-group">
                        <label for="region" class="control-label"> Currency:</label>
                        <input type="text" class="form-control" name="currency"  required>

                    </div>

                    <div class="form-group">
                        <label for="region" class="control-label">Branch:</label>
                        <input type="text" class="form-control" name="branch"  required>
                    </div>
                    <div class="form-group">
                        <label for="region" class="control-label">Location:</label>
                        <input type="text" class="form-control" name="location"  required>
                    </div>
                    <div class="form-group">
                        <label for="region" class="control-label">Relationship Officer:</label>
                        <input type="text" class="form-control" name="relationship_officer"  required>
                    </div>
                    <div class="form-group">
                        <label for="region" class="control-label">Relationship Contact:</label>
                        <input type="text" class="form-control" name="relationship_contact"  required>
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
                        r[++j] = '<td>' + value.bank_name + '</td>';
                        r[++j] = '<td>' + value.account_no + '</td>';
                        r[++j] = '<td>' + value.account_type + '</td>';
                        r[++j] = '<td>' + value.branch + '</td>';
                        r[++j] = '<td>' + value.relationship_officer + '</td>';

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