$('.datepickerr').datepicker({
    format: 'yyyy-mm-dd'
});


var transactionsdatatable = $('#transactionTbl').DataTable({
    responsive: true,
    dom: 'Bfrtip',
    buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
    ],
    language: {
        paginate:
                {previous: "&laquo;", next: "&raquo;"},
        search: "_INPUT_",
        searchPlaceholder: "Search…"
    },
    "order": [[4, "desc"]]



});

$('#transactionForm').on('submit', function (e) {
    e.preventDefault();
    var formData = $(this).serialize();

    console.log(formData);

    $('input:submit').attr("disabled", true);
    $('#loaderModal').modal('show');
    $.ajax({
        url: 'index.php?r=transactions/retreivetransaction',
        type: "GET",
        data: formData,
        dataType: "json",
        success: function (data) {
            console.log(data);
            $('#loaderModal').modal('hide');


            transactionsdatatable.clear().draw();
            // var obj = jQuery.parseJSON(data);
            if (data.length == 0) {
                console.log("NO DATA!");
            } else {

                var rowNum = 0;
                $.each(data, function (key, value) {
                    var j = -1;
                    var r = new Array();
                    var code;
                    if (value.status == "successful") {
                        code = "label-outline-success";
                    } else if (value.status == "failed") {
                        code = "label-outline-danger";
                    } else {
                        code = "label-outline-info";
                    }
                    r[++j] = '<td>' + value.bank_ref + '</td>';
                    r[++j] = '<td><span class="label ' + code + '" >' + value.status + ' </span></td>';
                    r[++j] = '<td> ' + value.account_number + '</td>';
                    r[++j] = '<td>' + value.narration + '</td>';
                    r[++j] = '<td>' + value.transaction_datetime + '</td>';
                    r[++j] = '<td >' + value.amount + '</td>';
                    r[++j] = '<td>' + value.debit_account + '</td>';
                    r[++j] = '<td>' + value.credit_account + '</td>';

                    r[++j] = '<td>' + value.service_name + '</td>';
                    r[++j] = '<td>' + value.channel_name + '</td>';
                    r[++j] = '<td>' + value.reason + '</td>';
                    r[++j] = '<td>' + value.ourref + '</td>';
                    r[++j] = '<td>' + value.their_ref + '</td>';

                    rowNum = rowNum + 1;


                    rowNode = transactionsdatatable.row.add(r);
                });

                rowNode.draw().node();
            }









        },
        error: function (request, status, error) {
            console.log(request.responseText);
        }
    });



});
function ordinal_suffix_of(i) {
        var j = i % 10,
                k = i % 100;
        if (j == 1 && k != 11) {
            return i + "st";
        }
        if (j == 2 && k != 12) {
            return i + "nd";
        }
        if (j == 3 && k != 13) {
            return i + "rd";
        }
        return i + "th";
    }
    
    function isInt(value) {
  return !isNaN(value) && (function(x) { return (x | 0) === x; })(parseFloat(value))
}



$.when(getTrendAnalysisAccMomo()).done(function (data) {
// the code here will be executed when all four ajax requests resolve.
// a1, a2, a3 and a4 are lists of length 3 containing the response text,
// status, and jqXHR object for each of the four ajax calls respectively
console.log(data);
    var regions = [];
    var figures = [];
    console.log('data her: ' + data);
    var dataSet = data.data;
    $.each(dataSet, function (i, item) {

        regions.push(ordinal_suffix_of(item.date));
        figures.push(item.value);
    });
    figures = figures.map(Number);
    console.log('figures: ' + figures);
    console.log('regions:' + regions);
    var ctx = document.getElementById("myChart");
    
    
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: regions,
            datasets: [{
                    "backgroundColor": "rgba(217, 35, 15, 0.75)",
                    "borderColor": "#d9230f",
                    "borderWidth": 2,
                    "pointBackgroundColor": "#fff",
                    "pointRadius": 3,
                    "label": "Total Cost ",
                    "data": figures

                }]

        }
    });
});
function getTrendAnalysisAccMomo() {


    return    $.ajax({
        url: 'index.php?r=transactions/trendanalysis',
        type: "GET",
        data: {transactiontype: "ACCT-TO-MOMO"},
        dataType: 'json'

    });
}


$.when(getTrendAnalysisAirtime()).done(function (data) {
// the code here will be executed when all four ajax requests resolve.
// a1, a2, a3 and a4 are lists of length 3 containing the response text,
// status, and jqXHR object for each of the four ajax calls respectively
console.log(data);
    var regions = [];
    var figures = [];
    console.log('data her: ' + data);
    var dataSet = data.data;
    $.each(dataSet, function (i, item) {

        regions.push(ordinal_suffix_of(item.date));
        figures.push(item.value);
    });
    figures = figures.map(Number);
    console.log('figures: ' + figures);
    console.log('regions:' + regions);
    var ctx = document.getElementById("airtimeChart");
    
    
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: regions,
            datasets: [{
                    "backgroundColor": "rgba(217, 35, 15, 0.75)",
                    "borderColor": "#d9230f",
                    "borderWidth": 2,
                    "pointBackgroundColor": "#fff",
                    "pointRadius": 3,
                    "label": "Total Cost ",
                    "data": figures

                }]

        }
    });
});
function getTrendAnalysisAirtime() {


    return    $.ajax({
        url: 'index.php?r=transactions/trendanalysis',
        type: "GET",
        data: {transactiontype: "AIRTIME"},
        dataType: 'json'

    });
}


$.when(getMonthPerformance()).done(function (data) {
// the code here will be executed when all four ajax requests resolve.
// a1, a2, a3 and a4 are lists of length 3 containing the response text,
// status, and jqXHR object for each of the four ajax calls respectively
console.log(data);
    var regions = [];
    var figures = [];
    console.log('data her: ' + data);
    var dataSet = data.data;
    $.each(dataSet, function (i, item) {

        regions.push(item.narration);
        figures.push(item.value);
    });
    figures = figures.map(Number);
    console.log('figures: ' + figures);
    console.log('regions:' + regions);
    var ctx = document.getElementById("monthChart");
    
    
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: regions,
            datasets: [{
                    "backgroundColor": "rgba(217, 35, 15, 0.75)",
                    "borderColor": "#d9230f",
                    "borderWidth": 2,
                    "pointBackgroundColor": "#fff",
                   
                    "label": "Total Cost ",
                    "data": figures

                }]

        }
    });
});
function getMonthPerformance() {


    return    $.ajax({
        url: 'index.php?r=transactions/monthperformance',
        type: "GET",
         dataType: 'json'

    });
}


