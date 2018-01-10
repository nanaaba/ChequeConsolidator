@extends('layouts.master')

@section('content')

<div class="layout-content-body">

    <div class="row">
        <div class="statistics">
           
        </div>

    </div>
</div>



@endsection
@section('customjs')
<script type="text/javascript">

    chequeStatistics();
    function chequeStatistics() {
        $.ajax({
            url: "{{url('cheques/statistics')}}",
            type: "GET",
            dataType: "json",
            success: function (data) {
                console.log(data);


                if (data.length == 0) {
                    console.log("NO DATA!");
                } else {
                    $.each(data, function (key, value) {
                        $('.statistics').append('<div class="col-md-4">' +
                                '<div class="card  ">' +
                                '<div class="card-header bg-primary"> ' +
                                '<strong>' + value.company_name + '</strong>' +
                                '</div>' +
                                '<div class="card-body" >' +
                                '<ul class="media-list">' +
                                '<li class="media">' +
                                '<div class="media media-left">' +
                                '<a href="{{ url('cheques/withdrawals') }}" class="btn btn-outline-primary btn-sm"> New Withdrawal</a>' +
                                '<br><br><br>' +
                                '<a href="{{ url('cheques/deposited') }}" class="btn btn-outline-primary btn-sm">New Deposit</a>' +
                                '</div>' +
                                '<div class="media-middle media-body"></div>' +
                                '<div class="media-middle media-right">' +
                                '<table class="table table-borderless table-middle">' +
                                ' <tbody>' +
                                '  <tr>' +
                                '    <td class="col-xs-6">Bank:</td>' +
                                '  <td class="col-xs-6">' +
                                value.bank_name +
                                '  </td>' +
                                '  </tr>' +
                                '<tr>' +
                                ' <td class="col-xs-6">Account No:</td>' +
                                ' <td class="col-xs-6">' +
                                value.account_no +
                                ' </td>' +
                                ' </tr>' +
                                '<tr>' +
                                '<td class="col-xs-6">Total Deposits:</td>' +
                                '<td class="col-xs-6"><span class="badge badge-info">' + value.total_deposits + '</span>' +
                                '</td>' +
                                '</tr>' +
                                '<tr>' +
                                '<td class="col-xs-6">Total Withdrawals:</td>' +
                                '<td class="col-xs-6"><span class="badge badge-warning">' +
                                value.total_withdrawals +
                                '</span></td>' +
                                '</tr>' +
                                ' </tbody>' +
                                ' </table>' +
                                ' </div>' +
                                ' </li>' +
                                ' </ul>' +
                                ' </div>' +
                                '</div>' +
                                '</div>   ');



                    });


                }

            },
            error: function (jXHR, textStatus, errorThrown) {
                swal("Error!", "Contact Administrator", "error");
            }
        });

    }
</script>

@endsection