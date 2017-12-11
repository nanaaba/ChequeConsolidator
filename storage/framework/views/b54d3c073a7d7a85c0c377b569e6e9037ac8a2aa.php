<?php $__env->startSection('content'); ?>



<div class="be-content">
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="widget widget-tile">
                    <div id="spark1" class="chart sparkline"><canvas width="85" height="35" style="display: inline-block; width: 85px; height: 35px; vertical-align: top;"></canvas></div>
                    <div class="data-info">
                        <div class="desc"> Users</div>
                        <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span data-toggle="counter" data-end="113" class="number">113</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="widget widget-tile">
                    <div id="spark2" class="chart sparkline"><canvas width="81" height="35" style="display: inline-block; width: 81px; height: 35px; vertical-align: top;"></canvas></div>
                    <div class="data-info">
                        <div class="desc">Entered Ghana</div>
                        <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span data-toggle="counter" data-end="80" data-suffix="%" class="number">80</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="widget widget-tile">
                    <div id="spark3" class="chart sparkline"><canvas width="85" height="35" style="display: inline-block; width: 85px; height: 35px; vertical-align: top;"></canvas></div>
                    <div class="data-info">
                        <div class="desc">Left Ghana</div>
                        <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span data-toggle="counter" data-end="532" class="number">532</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="widget widget-tile">
                    <div id="spark4" class="chart sparkline"><canvas width="85" height="35" style="display: inline-block; width: 85px; height: 35px; vertical-align: top;"></canvas></div>
                    <div class="data-info">
                        <div class="desc">Reported Cases</div>
                        <div class="value"><span class="indicator indicator-negative mdi mdi-chevron-down"></span><span data-toggle="counter" data-end="113" class="number">113</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="panel">

                <div class="panel-body">
                    <canvas id="myChart" ></canvas>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="panel">
                <div class="panel-heading">
                    Number of Reported Cases Per Agent
                </div>
                <div class="panel-body">
                    <canvas id="agent" ></canvas>

                </div>
            </div>
        </div>


        <div class="row">
            <div class="panel">
                <div class="panel-heading">
                    Over Stayed Cars Trend Analysis
                </div>
                <div class="panel-body">
                    <canvas id="overstayed" ></canvas>

                </div>
            </div>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('customjs'); ?>

<script>



    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Cars Entered Ghana", "Cars Left Ghana"],
            datasets: [{
                    backgroundColor: [
                        "#ff6384",
                        "#3498db",
                        "#95a5a6",
                        "#9b59b6",
                        "#f1c40f",
                        "#e74c3c",
                        "#34495e",
                        "#36a2eb",
                        "#cc65fe",
                        "#ffce56"
                    ], "borderColor": "rgba(54, 162, 235, 0.2)",
                    "data": [10, 20]

                }]

        }
    });



    var ctx = document.getElementById("agent").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Aba", "Ama", "Kofi", "Agyapong", "Kweku", "Kwame"],
            datasets: [{
                    label: '# of Agent Cases',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
        },
        options: {
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
            }
        }
    });
    
    
    
       var ctx = document.getElementById("overstayed").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["January", "Febuary", "March", "April", "May", "June"],
            datasets: [{
                    label: 'OverStayed Cars',
                    data: [12, 19, 3, 5, 2, 3],
                    
                    borderColor: [
                       
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
        },
        options: {
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
            }
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>