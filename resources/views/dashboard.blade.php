@extends('layouts.master')

@section('content')

<div class="layout-content-body">

    <div class="row">
        <div class="statistics">
            <!--               <div class="col-md-4">
                              <div class="card">
                                <div class="card-header">
                                  
                                  <strong>Koala Company</strong>
                                </div>
                                <div class="card-body" data-toggle="match-height" style="">
                                  <table class="table table-borderless table-middle">
                                    <tbody>
                                      <tr>
                                        <td class="col-xs-6">Bank:</td>
                                        
                                        <td class="col-xs-6">
                                          UBA
                                        </td>
                                        
                                      </tr>
                                    <tr>
                                        <td class="col-xs-6">Account No:</td>
                                        
                                        <td class="col-xs-6">
                                          1120000000
                                        </td>
                                        
                                      </tr>
                                      <tr>
                                        <td class="col-xs-6">Total Deposits:</td>
                                        
                                        <td class="col-xs-6">
                                          5
                                        </td>
                                        
                                      </tr>
                                      
                                        <tr>
                                        <td class="col-xs-6">Total Withdrawals:</td>
                                        
                                        <td class="col-xs-6">
                                          5
                                        </td>
                                        
                                      </tr>
                                      <tr>
                                        <td class="col-xs-6">Pending(Withdrawals):</td>
                                        
                                        <td class="col-xs-6">
                                          5
                                        </td>
                                        
                                      </tr>
                                       <tr>
                                        <td class="col-xs-6">Cleared(Withdrawals):</td>
                                        
                                        <td class="col-xs-6">
                                          5
                                        </td>
                                        
                                      </tr>
                                       <tr>
                                        <td class="col-xs-6">Bounced(Withdrawals):</td>
                                        
                                        <td class="col-xs-6">
                                          5
                                        </td>
                                        
                                      </tr>
                                       <tr>
                                        <td class="col-xs-6">Pending(Deposit):</td>
                                        
                                        <td class="col-xs-6">
                                          5
                                        </td>
                                        
                                      </tr>
                                       <tr>
                                        <td class="col-xs-6">Cleared(Deposit):</td>
                                        
                                        <td class="col-xs-6">
                                          5
                                        </td>
                                        
                                      </tr>
                                       <tr>
                                        <td class="col-xs-6">Bounced(Deposit):</td>
                                        
                                        <td class="col-xs-6">
                                          5
                                        </td>
                                        
                                      </tr>
                                      
                                      
                                      
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                      
                            </div>    -->
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
                                '<div class="card-body" data-toggle="match-height" style="">' +
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
                                '<td class="col-xs-6"><span class="badge badge-info">'  +  value.total_deposits +'</span>' +
                            
                                '</td>' +
                                '</tr>' +
                                '<tr>' +
                                '<td class="col-xs-6">Total Withdrawals:</td>' +
                                '<td class="col-xs-6"><span class="badge badge-warning">' +
                                value.total_withdrawals +
                                '</span></td>' +
                                '</tr>' +
                                '<tr>' +
                                ' <td class="col-xs-6">Pending(Withdrawals):</td>' +
                                '<td class="col-xs-6"><span class="badge badge-outline-primary">' +
                                value.pending_payments +
                                ' </span></td>' +
                                '</tr>' +
                                '<tr>' +
                                '<td class="col-xs-6">Cleared(Withdrawals):</td>' +
                                '<td class="col-xs-6"><span class="badge badge-outline-primary">' +
                                value.cleared_payments +
                                '</span></td>' +
                                '</tr>' +
                                '<tr>' +
                                '<td class="col-xs-6">Bounced(Withdrawals):</td> ' +
                                '<td class="col-xs-6"><span class="badge badge-outline-primary">' +
                                value.bounced_payments +
                                '</span></td>' +
                                '</tr>' +
                                '<tr>' +
                                '<td class="col-xs-6">Pending(Deposit):</td>' +
                                '<td class="col-xs-6"><span class="badge badge-outline-default">' +
                                value.pending_deposit +
                                '</span></td>' +
                                ' </tr>' +
                                '<tr>' +
                                ' <td class="col-xs-6">Cleared(Deposit):</td>' +
                                ' <td class="col-xs-6"><span class="badge badge-outline-default">' +
                                value.cleared_deposit +
                                '</span> </td>' +
                                ' </tr>' +
                                ' <tr>' +
                                '  <td class="col-xs-6">Bounced(Deposit):</td>' +
                                '<td class="col-xs-6"><span class="badge badge-outline-default">' +
                                value.bounced_deposit +
      ' </span></td>' +
                                '</tr>' +
                                ' </tbody>' +
                                ' </table>' +
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