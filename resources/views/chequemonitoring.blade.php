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

                    <form id="updateCommodityForm" >


                        <div class="form-group col-sm-6">
                            <label for="region" class="control-label">Type:</label>
                            <select class="form-control select2">
                                <option value="">Select --</option>
                                <option value="">Select --</option>
                                <option value="">Select --</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="region" class="control-label">Date:</label>
                            <input type="date" class="form-control" name="name" id="commodityName" required>
                        </div>
                        <input type="hidden" class="form-control" name="type" value="updateInformation">

                        <input type="hidden" class="form-control" name="code" id="commodity_code">
                        <input type="hidden" class="form-control" name="tablename" value="commodites">


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
                        <table id="bankTbl" class="table table-middle nowrap">
                            <thead>
                                <tr>

                                    <th>Date of payment  </th>
                                    <th> Cheque Date</th>
                                    <th>Name of Payee </th>
                                    <th>Amount</th>
                                    <th>Cheque  issuers name</th>
                                    <th> Issuing Bank </th>
                                    <th> Receivers Bank </th>
                                    <th> Deposited By </th>


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




@endsection
@section('customjs')
<script type="text/javascript">

    $('#bankTbl').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });

</script>
@endsection