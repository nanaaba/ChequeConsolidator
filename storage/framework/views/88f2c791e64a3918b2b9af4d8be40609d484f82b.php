<?php $__env->startSection('content'); ?>

<div class="be-content">
    <div class="page-head">
        <h2 class="page-head-title">General Report</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">Home</a></li>
            <li><a href="#">Report</a></li>
            <li class="active">General Report</li>
        </ol>
    </div>
    <div class="main-content container-fluid">
        <!--Basic forms-->

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading panel-heading-divider">
                        <div class="panel-body">
                            <form id="reportForm" >

                                <?php echo e(csrf_field()); ?>


                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class=" control-label">Report Type</label>

                                            <select class="select2 select2-hidden-accessible" name="reportlevel" id="reportlevel" tabindex="-1" aria-hidden="true" required>

                                                <option value="">Select ---</option>
                                                <option value="Over Stayed Cars">Over Stayed Cars</option> 
                                                <option value="New Entry">New Entry</option>

                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class=" control-label">Car Types</label>

                                            <select class="select2 select2-hidden-accessible" name="car_type" id="cartype" tabindex="-1" aria-hidden="true" required>

                                                <option value="">Select ---</option>
                                                <option value="Van">Van</option>
                                                <option value="Sports Car">Sports Car</option>


                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class=" control-label">Car Brand</label>

                                            <select class="select2 select2-hidden-accessible" name="car_brand" id="reportlevel" tabindex="-1" aria-hidden="true" required>

                                                <option value="">Select ---</option>
                                                <option value="Nissan">Nissan</option> 
                                                <option value="Toyota">Toyota</option>

                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class=" control-label">Country of Origin</label>

                                            <select class="select2 select2-hidden-accessible" name="country_of_origin" id="reportlevel" tabindex="-1" aria-hidden="true" required>

                                                <option value="">Select ---</option>
                                                <option value="Togo">Togo</option> 
                                                <option value="Cote Dvoire">Cote Dvoire</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class=" control-label">Date Range</label>

                                            <input type="text" name="daterange" value="" class="form-control daterange">
                                        </div>
                                    </div>
                                </div>







                                <div class="row xs-pt-15">
                                    <div class="col-xs-6">

                                    </div>
                                    <div class="col-xs-6">
                                        <p class="text-right">
                                            <button type="submit" class="btn btn-space btn-primary">Spool Result</button>

                                        </p>
                                    </div>
                                </div>
                            </form>





                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default panel-border-color panel-border-color-primary">



                    <div class="panel-body table-responsive">
                        <table id="transactionTbl" class="  table table-striped table-hover table-fw-widget">
                            <thead>

                                <tr>
                                    <th>Owner</th>
                                    <th>Gender</th>
                                    <th>Chassis Number</th>
                                    <th>OverStayed Days</th>
                                    <th>Entry Date</th>
                                    <th>Due Date</th>
                                    <th>Country</th>
                                    <th>Vehicle Type</th>
                                    <th>Fuel Capacity</th>
                                    <th>Mileage </th>
                                    <th>TransMission </th>
                                    <th>Custom Details</th>
                                    <th>Dvla Details </th>

                                </tr>
                            </thead>
                            <tbody >

                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('customjs'); ?>
<script type="text/javascript">


//        var datatable = $('#transactionTbl').DataTable({
//            buttons: [
//                'copy', 'excel', 'pdf'
//            ]
//        });
//        datatable.buttons().container()
//                .appendTo($('.col-sm-6:eq(0)', datatable.table().container()));

    var datatable = $('#transactionTbl').DataTable({
        lengthChange: false,
        buttons: [
            {extend: 'copyHtml5', footer: true},
            {extend: 'excelHtml5', footer: true},
            {extend: 'csvHtml5', footer: true},
            {extend: 'pdfHtml5', footer: true},
            {extend: 'print', footer: true}
        ]
    });


    datatable.buttons().container()
            .appendTo('#transactionTbl_wrapper .col-sm-6:eq(0)');
    $('#reportForm').on('submit', function (e) {
        $('.loader').addClass('be-loading-active');
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: "<?php echo e(url('reports/generalreport')); ?>",
            type: "POST",
            data: formData,
            dataType: 'json',
            success: function (data) {


                $('.loader').removeClass('be-loading-active');
                console.log('server data :' + data.data);
                var dataSet = data.data;
                console.log(dataSet);
                datatable.clear().draw();
                console.log('size' + dataSet.length);
                if (dataSet.length == 0) {
                    $('#infoModal').modal('show');

                    return;
                } else {
                    $.each(dataSet, function (key, value) {




                        var j = -1;
                        var r = new Array();
                        // represent columns as array
                        r[++j] = '<td>' + value.ownerName + '</td>';
                        r[++j] = '<td>' + value.gender + '</td>';

                        r[++j] = '<td>' + value.chassisNumber + '</td>';
                        r[++j] = '<td class="subject">' + value.overstayeddays + ' days </td>';
                        r[++j] = '<td class="subject"> ' + value.entryDate + '</td>';
                        r[++j] = '<td class="subject">' + value.dueDate + '</td>';
                        r[++j] = '<td class="subject">' + value.country + '</td>';
                        r[++j] = '<td class="subject">' + value.vehicleType + '</td>';
                        r[++j] = '<td class="subject">' + value.fuelCapacity + ' litres</td>';
                        r[++j] = '<td class="subject">' + value.mileage + '</td>';
                        r[++j] = '<td class="subject">' + value.transmission + '</td>';
                        r[++j] = '<td class="subject"></td>';
                        r[++j] = '<td class="subject"> </td>';
                        rowNode = datatable.row.add(r);
                    });
                    rowNode.draw().node();
                }
                var total = datatable.column(2).data().sum();
                $('#totalcost').html('GHS ' + total.toFixed(2));
                console.log('AMount' + total);
                $('.loader').removeClass('be-loading-active');
            }



        });
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.forms', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>