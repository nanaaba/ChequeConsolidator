<?php $__env->startSection('content'); ?>

<div class="layout-content-body">

    <div class="text m-b">
        <h3 class="m-b-0">Account Statement</h3>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-body">

                    <form id="accountstmt" >
                        <div class="row">
                            <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="region" class="control-label">Company:</label>
                                    <select class="form-control select2" name="company_id" id="companies"  required>
                                        <option value="">Select --</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="region" class="control-label">Bank:</label>
                                    <select class="form-control select2" name="bank" id="banks" required>
                                        <option value="">Loading --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label  class="form-label"> Date Range</label>
                                    <div class="input-group input-daterange" data-provide="datepicker" data-date-autoclose="true" data-date-format="yyyy-mm-dd">
                                        <input class="form-control" type="text" name="start_date">
                                        <span class="input-group-addon">to</span>
                                        <input class="form-control" type="text" name="end_date">
                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" name="type" value="updateInformation">

                            <input type="hidden" class="form-control" name="code" id="commodity_code">
                            <input type="hidden" class="form-control" name="tablename" value="commodites">
                        </div>

                        <br><br>
                        <div class="row">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-block btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-bottom:5px;">

    </div>
    <div class="row" id="stmntdiv" style="display: none"  >
        <div class="col-xs-12">
            <div class="panel" id="printdiv">
                <div class="panel-body">
                    <div class="panel-body p-a-lg">
                        <div >
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1 class="text-right">
                                        <span id="bank_name"></span>
                                    </h1>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-sm-6">

                                    <div class="p-a">
                                        Account Statement Of Transactions<br>
                                        <strong> Start Date: </strong> <span id="startdate"></span> &nbsp;&nbsp;&nbsp;
                                        <strong>End Date: </strong><span id="enddate"></span><br><br>
                                        <span id="company_name"></span>
                                        <br> <span id="address"></span>
                                        <br> <span id="contact"></span>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-3 col-sm-push-0">
                                    <div class="p-a">
                                        <strong>   Account Number:</strong>
                                        <br> <span id="accountno"></span>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3 col-sm-push-0">
                                    <div class="p-a">
                                        <strong>    Currency:</strong>
                                        <br> <span id="currency"></span>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-striped" id="stmtTbl" >
                                            <thead>
                                                <tr>

                                                    <th>Date</th>
                                                    <th>Description</th>
                                                    <th>ChqNo</th>
                                                    <th>ValDate</th>
                                                    <th>Debit </th>
                                                    <th>Credit</th>
                                                </tr>
                                            </thead>
                                            <tbody >

                                            </tbody>

                                            <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th colspan="2">Total Debits/Credits</th>
                                                    <th id="totaldebits"></th>
                                                    <th id="totalcredits"></th>                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--              <div class="row">
                                            <div class="col-md-8">
                                              <p>
                                                <small>
                                                  <em>Thanks for choosing Elephant.Store! If you have any questions about your order, don't hesitate to contact our support team at support@elephant.store, or give us a call at 1 415-666-9999, Monday through Friday, 8 a.m. to 6 p.m.</em>
                                                </small>
                                              </p>
                                            </div>
                                          </div>-->
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="text-center hidden-print">
                                    <div class="p-y-lg">
                                        <a class="btn btn-success btn-sm" onclick="printDiv('printdiv')">
                                            <span class="icon icon-print icon-lg icon-fw"></span>
                                            Print
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
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




<?php $__env->stopSection(); ?>
<?php $__env->startSection('customjs'); ?>
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


    $.ajax({
        url: "<?php echo e(url('companies/all')); ?>",
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
            url: "companies/banks/" + companyid,
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

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

    function printv()
    {
//w.document.write('<div id="diary">' + $('#diary').html() + '</div>');

        var divToPrint = document.getElementById('printdiv');

        var newWin = window.open('', 'Print-Window');

        newWin.document.open();

        newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHtml + '</body></html>');

        newWin.document.close();

        setTimeout(function () {
            newWin.close();
        }, 10);

    }


    $('#accountstmt').on('submit', function (e) {
        e.preventDefault();
        // var validator = $("#saveRegionForm").validate();
        var formData = $(this).serialize();
        var startdate = $("input[name=start_date]").val();
        var enddate = $("input[name=end_date]").val();

        console.log(formData);
        $('input:submit').attr("disabled", true);
        $.ajax({
            url: "<?php echo e(url('getaccountstatement')); ?>",
            type: "POST",
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);

//get company n bank information
                var company_data = data.account_data;
                var company_name = company_data[0].company_name;
                var address = company_data[0].company_location;
                var account_no = company_data[0].account_no;
                var currency = company_data[0].currency;
                var bank_name = company_data[0].bank_name;
                var account_type = company_data[0].account_type;

//statement data 
                var statement_data = data.statement;

                $('#company_name').html(company_name);
                $('#address').html(address);
                $('#accountno').html(account_no);
                $('#currency').html(currency);
                $('#startdate').html(startdate);
                $('#enddate').html(enddate);
                $('#bank_name').html(bank_name);
                $("#stmtTbl tbody").html(" ");
                populateStatement(statement_data);

            },
            error: function (jXHR, textStatus, errorThrown) {
                swal("Error!", "Couldnt save:Duplicate entry,name already exist", "error");
            }
        });




    });


    function populateStatement(stmtData) {

        console.log('statement data :' + stmtData);
        var newRowContent = "";
        var totalcredits = 0;
        var totaldebits=0;
        $.each(stmtData, function (key, value) {
            var  creditamt = "";
            var debitamt="";
            if (value.cheque_type_system == "debit") {
                debitamt = value.amount;
                totaldebits = totaldebits + value.amount;
                creditamt = " ";
            } else {
                creditamt = value.amount;
                debitamt = " ";
                totalcredits = totalcredits + value.amount;
            }
            newRowContent = "<tr>\n\
    <td>" + value.transaction_date + "</td>\n\
<td>" + value.narration + "</td>\n\
<td>" + value.chequeno + "</td>\n\
<td>" + value.clearing_date + "</td>\n\
<td>" + debitamt + "</td>\n\
<td>" + creditamt + "</td>\n\
</tr>";

console.log(totalcredits+""+totaldebits);
            $("#stmtTbl tbody").append(newRowContent);
            $('#totaldebits').html(totaldebits);
            $('#totalcredits').html(totalcredits);

        });

        $('#stmntdiv').show("fold", 1000);

    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>