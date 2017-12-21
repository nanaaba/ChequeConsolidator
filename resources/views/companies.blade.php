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