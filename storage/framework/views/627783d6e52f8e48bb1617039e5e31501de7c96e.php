<?php $__env->startSection('content'); ?>

<div class="layout-content-body">

    <div class="text m-b">
        <h3 class="m-b-0">Cheques Payments</h3>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="col-md-10 ">

            </div>
            <div class="col-md-2 ">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#commodityModal" data-whatever="@mdo"> New Cheque</button>
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

<div class="modal fade" id="commodityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" >New Cheque</h4>
            </div>
            <form id="saveCommodityForm">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="region" class="control-label">Date of payment:</label>
                        <input type="date" class="form-control datepicker" name="paymentdate"  required>
                    </div>
                    <div class="form-group">
                        <label for="region" class="control-label"> Cheque Date:</label>
                        <input type="date" class="form-control datepicker" name="chequedate"  required>
                    </div>
                    <div class="form-group">
                        <label for="region" class="control-label">Name of Payee:</label>
                        <input type="text" class="form-control" name="payeename"  required>
                    </div>
                    <div class="form-group">
                        <label for="region" class="control-label">Currency:</label>
                        <input type="text" class="form-control" name="currency"  required>
                    </div>
                    <div class="form-group">
                        <label for="region" class="control-label">Amount:</label>
                        <input type="text" class="form-control" name="amount"  required>
                    </div>
                    <div class="form-group">
                        <label for="region" class="control-label">Cheque  issuers name:</label>
                        <input type="text" class="form-control" name="issuers_name"  required>
                    </div>
                    <div class="form-group">
                        <label for="region" class="control-label">Issuing Bank:</label>
                        <input type="text" class="form-control" name="issuing_bank"  required>
                    </div>
                    <div class="form-group">
                        <label for="region" class="control-label">Receivers Bank:</label>
                        <input type="text" class="form-control" name="receivers_banks"  required>
                    </div> 
                    <div class="form-group">
                        <label for="region" class="control-label">Deposited By:</label>
                        <input type="text" class="form-control" name="deposited_by"  required>
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




<?php $__env->stopSection(); ?>
<?php $__env->startSection('customjs'); ?>
<script type="text/javascript">

    $('#bankTbl').DataTable();

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>