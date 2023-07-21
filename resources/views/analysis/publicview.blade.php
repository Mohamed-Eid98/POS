@extends('layouts.master')

@section('title')
    عرض
@endsection

@section('css')
    <!-- DataTables -->
    <link
        href="{{ asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css') }}" />
    <link
        href="{{ asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css') }}" />


    <!-- Responsive datatable examples -->
    <link href="{{ asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    {{--
        <style>
            td strong a {
              text-decoration: underline;
              color:black;

            }
          </style> --}}
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            عرض
        @endslot
        @slot('title')
            ..
        @endslot
    @endcomponent

    @if (session('delete'))
        <div class="alert alert-danger">
            {{ session('delete') }}
        </div>
    @endif

    {{-- @if (session('edit'))
        <div class="alert alert-success">
            {{ session('edit') }}
        </div>
    @endif --}}



    <div class="row">




        @php
            $all_orders = DB::table('orders')->count();
            $all_orderssum = DB::table('orders')->sum('final_total');
            $total_profit = DB::table('orders')->sum('profit_total');

            $pending_orders = DB::table('orders')
                ->where('status', '=', 'Pending')
                ->count();
            $deliered_orders = DB::table('orders')
                ->where('status', '=', 'Delivered')
                ->count();
            $rejected_orders = DB::table('orders')
                ->where('status', '=', 'Rejected')
                ->count();
            $cancelled_orders = DB::table('orders')
                ->where('status', '=', 'Cancelled')
                ->count();
            $inPrograss_orders = DB::table('orders')
                ->where('status', '=', 'InProgress')
                ->count();
            $paid_orders = DB::table('orders')
                ->where('status', '=', 'Paid')
                ->count();
            $paid_orders_sum = DB::table('orders')
                ->where('status', '=', 'Paid')
                ->sum('final_total');
            $payments_today = DB::table('payments')
                ->whereDate('created_at', today())
                ->sum('price');
            $month = date('m'); // Get the current month
            $year = date('Y'); // Get the current year
            $payments_month = DB::table('payments')
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->sum('price');
            $payments_sum = DB::table('payments')->sum('price');
            $payments_count = DB::table('payments')->count();

        @endphp
        <div class="col-xl-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">عدد الطلبيات</p>
                                    <h4 class="mb-0">{{ $all_orders }}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-copy-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium"> مجموع المبيعات</p>
                                    <h4 class="mb-0">{{ $all_orderssum }} دينار</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center ">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-archive-in font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium"> صافي المبيعات</p>
                                    <h4 class="mb-0">{{ $total_profit }} دينار</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium"> الطلبات المباعه </p>
                                    <h4 class="mb-0">{{ $paid_orders_sum }}دينار</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="fas fa-chart-bar"></i> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">


                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">الطلبات</h4>

                            <div id="column_chart_datalabel" data-colors='["--bs-primary"]' class="apex-charts"

                                dir="ltr"height="300">
                            </div>
                        </div>
                    </div>
                    <!--end card-->
                </div>
                <!-- end row -->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title mb-4">صافي المبيعات</h4>



                            <canvas id="bar" data-colors='["--bs-success-rgb, 0.8", "--bs-success"]'
                                height="300"></canvas>

                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>


        </div>
    </div>
@endsection





@section('script')
    <!-- apexcharts -->

    <script>
function getChartColorsArray(e) {
    if (null !== document.getElementById(e)) {
        var t = document.getElementById(e).getAttribute("data-colors");
        if (t) return (t = JSON.parse(t)).map(function (e) {
            var t = e.replace(" ", "");
            if (-1 === t.indexOf(",")) {
                var r = getComputedStyle(document.documentElement).getPropertyValue(t);
                return r || t
            }
            var o = e.split(",");
            return 2 != o.length ? t : "rgba(" + getComputedStyle(document.documentElement).getPropertyValue(o[0]) + "," + o[1] + ")"
        });
        console.warn("data-colors Attribute not found on:", e)
    }
}
var lineChartDatalabelColors = getChartColorsArray("line_chart_datalabel");
lineChartDatalabelColors && (options = {
    chart: {
        height: 380,
        type: "line",
        zoom: {
            enabled: !1
        },
        toolbar: {
            show: !1
        }
    },
    colors: lineChartDatalabelColors,
    dataLabels: {
        enabled: !1
    },
    stroke: {
        width: [3, 3],
        curve: "straight"
    },
    series: [{
        name: "High - 2018",
        data: [26, 24, 32, 36, 33, 31, 33]
    }, {
        name: "Low - 2018",
        data: [14, 11, 16, 12, 17, 13, 12]
    }],
    title: {
        text: "Average High & Low Temperature",
        align: "left",
        style: {
            fontWeight: "500"
        }
    },
    grid: {
        row: {
            colors: ["transparent", "transparent"],
            opacity: .2
        },
        borderColor: "#f1f1f1"
    },
    markers: {
        style: "inverted",
        size: 6
    },
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
        title: {
            text: "Month"
        }
    },
    yaxis: {
        title: {
            text: "Temperature"
        },
        min: 5,
        max: 40
    },
    legend: {
        position: "top",
        horizontalAlign: "right",
        floating: !0,
        offsetY: -25,
        offsetX: -5
    },
    responsive: [{
        breakpoint: 600,
        options: {
            chart: {
                toolbar: {
                    show: !1
                }
            },
            legend: {
                show: !1
            }
        }
    }]
}, (chart = new ApexCharts(document.querySelector("#column_chart"), options)).render());
var columnChartDatalabelColors = getChartColorsArray("column_chart_datalabel");
columnChartDatalabelColors && (options = {
    chart: {
        height: 350,
        type: "bar",
        toolbar: {
            show: !1
        }
    },
    plotOptions: {
        bar: {
            dataLabels: {
                position: "top"
            }
        }
    },
    dataLabels: {
        enabled: !0,
        formatter: function (e) {
            return e + "%"
        },
        offsetY: -22,
        style: {
            fontSize: "12px",
            colors: ["#304758"]
        }
    },
    series: [{
        name: "Inflation",
        data: {!! json_encode($data) !!}
    }],
    colors: columnChartDatalabelColors,
    grid: {
        borderColor: "#f1f1f1"
    },
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        position: "top",
        labels: {
            offsetY: -18
        },
        axisBorder: {
            show: !1
        },
        axisTicks: {
            show: !1
        },
        crosshairs: {
            fill: {
                type: "gradient",
                gradient: {
                    colorFrom: "#D8E3F0",
                    colorTo: "#BED1E6",
                    stops: [0, 100],
                    opacityFrom: .4,
                    opacityTo: .5
                }
            }
        },
        tooltip: {
            enabled: !0,
            offsetY: -35
        }
    },
    fill: {
        gradient: {
            shade: "light",
            type: "horizontal",
            shadeIntensity: .25,
            gradientToColors: void 0,
            inverseColors: !0,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [50, 0, 100, 100]
        }
    },
    yaxis: {
        axisBorder: {
            show: !1
        },
        axisTicks: {
            show: !1
        },
        labels: {
            show: !1,
            formatter: function (e) {
                return e + "%"
            }
        }
    },
    title: {
        text: "Monthly Inflation in Argentina, 2002",
        floating: !0,
        offsetY: 330,
        align: "center",
        style: {
            color: "#444",
            fontWeight: "500"
        }
    }
}, (chart = new ApexCharts(document.querySelector("#column_chart_datalabel"), options)).render());
var barChartColors = getChartColorsArray("bar_chart");
barChartColors && (options = {
    chart: {
        height: 350,
        type: "bar",
        toolbar: {
            show: !1
        }
    },
    plotOptions: {
        bar: {
            horizontal: !0
        }
    },
    dataLabels: {
        enabled: !1
    },
    series: [{
        data: [380, 430, 450, 475, 550, 584, 780, 1100, 1220, 1365]
    }],
    colors: barChartColors,
    grid: {
        borderColor: "#f1f1f1"
    },
    xaxis: {
        categories: ["South Korea", "Canada", "United Kingdom", "Netherlands", "Italy", "France", "Japan", "United States", "China", "Germany"]
    }
});

    </script>


<script>

function getChartColorsArray(r) {
    if (null !== document.getElementById(r)) {
       var o = document.getElementById(r).getAttribute("data-colors");
       if (o) return (o = JSON.parse(o)).map(function (r) {
          var o = r.replace(" ", "");
          if (-1 === o.indexOf(",")) {
             var e = getComputedStyle(document.documentElement).getPropertyValue(o);
             return e || o
          }
          var t = r.split(",");
          return 2 != t.length ? o : "rgba(" + getComputedStyle(document.documentElement).getPropertyValue(t[0]) + "," + t[1] + ")"
       })
    }
 }! function (p) {
    "use strict";

    function r() {}
    r.prototype.respChart = function (r, o, e, t) {
       Chart.defaults.global.defaultFontColor = "#9295a4", Chart.defaults.scale.gridLines.color = "rgba(166, 176, 207, 0.1)";
       var a = r.get(0).getContext("2d"),
          n = p(r).parent();

       function l() {
          r.attr("width", p(n).width());
          switch (o) {
             case "Line":
                new Chart(a, {
                   type: "line",
                   data: e,
                   options: t
                });
                break;
             case "Doughnut":
                new Chart(a, {
                   type: "doughnut",
                   data: e,
                   options: t
                });
                break;
             case "Pie":
                new Chart(a, {
                   type: "pie",
                   data: e,
                   options: t
                });
                break;
             case "Bar":
                new Chart(a, {
                   type: "bar",
                   data: e,
                   options: t
                });
                break;
             case "Radar":
                new Chart(a, {
                   type: "radar",
                   data: e,
                   options: t
                });
                break;
             case "PolarArea":
                new Chart(a, {
                   data: e,
                   type: "polarArea",
                   options: t
                })
          }
       }
       p(window).resize(l), l()
    }, r.prototype.init = function () {
       var r, o = getChartColorsArray("lineChart");
       o && (r = {
          labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October"],
          datasets: [{
             label: "Sales Analytics",
             fill: !0,
             lineTension: .5,
             backgroundColor: o[0],
             borderColor: o[1],
             borderCapStyle: "butt",
             borderDash: [],
             borderDashOffset: 0,
             borderJoinStyle: "miter",
             pointBorderColor: o[1],
             pointBackgroundColor: "#fff",
             pointBorderWidth: 1,
             pointHoverRadius: 5,
             pointHoverBackgroundColor: o[1],
             pointHoverBorderColor: "#fff",
             pointHoverBorderWidth: 2,
             pointRadius: 1,
             pointHitRadius: 10,
             data: [65, 59, 80, 81, 56, 55, 40, 55, 30, 80]
          }, {
             label: "Monthly Earnings",
             fill: !0,
             lineTension: .5,
             backgroundColor: o[2],
             borderColor: o[3],
             borderCapStyle: "butt",
             borderDash: [],
             borderDashOffset: 0,
             borderJoinStyle: "miter",
             pointBorderColor: o[3],
             pointBackgroundColor: "#fff",
             pointBorderWidth: 1,
             pointHoverRadius: 5,
             pointHoverBackgroundColor: o[3],
             pointHoverBorderColor: "#eef0f2",
             pointHoverBorderWidth: 2,
             pointRadius: 1,
             pointHitRadius: 10,
             data: [80, 23, 56, 65, 23, 35, 85, 25, 92, 36]
          }]
       }, this.respChart(p("#lineChart"), "Line", r, {
          scales: {
             yAxes: [{
                ticks: {
                   max: 100,
                   min: 20,
                   stepSize: 10
                }
             }]
          }
       }));
       var e, t = getChartColorsArray("doughnut");
       t && (e = {
          labels: ["Desktops", "Tablets"],
          datasets: [{
             data: [300, 210],
             backgroundColor: t,
             hoverBackgroundColor: t,
             hoverBorderColor: "#fff"
          }]
       }, this.respChart(p("#doughnut"), "Doughnut", e));
       var a, n = getChartColorsArray("pie");
       n && (a = {
          labels: ["Desktops", "Tablets"],
          datasets: [{
             data: [300, 180],
             backgroundColor: n,
             hoverBackgroundColor: n,
             hoverBorderColor: "#fff"
          }]
       }, this.respChart(p("#pie"), "Pie", a));
       var l, i = getChartColorsArray("bar");
       i && (l = {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
             label: "Sales Analytics",
             backgroundColor: i[0],
             borderColor: i[0],
             borderWidth: 1,
             hoverBackgroundColor: i[1],
             hoverBorderColor: i[1],
             data: {!! json_encode($profit_data) !!}
          }]
       }, this.respChart(p("#bar"), "Bar", l, {
          scales: {
             xAxes: [{
                barPercentage: .4
             }]
          }
       }));

    }, p.ChartJs = new r, p.ChartJs.Constructor = r
 }(window.jQuery),
 function () {
    "use strict";
    window.jQuery.ChartJs.init()
 }();

</script>


@endsection
