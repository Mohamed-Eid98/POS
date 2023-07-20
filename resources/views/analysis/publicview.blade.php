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
            $all_orders_shipping = DB::table('orders')->sum('shipping_cost');

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
                                    <h4 class="mb-0">{{ $all_orderssum - $all_orders_shipping }} دينار</h4>
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





@section('js')
    <!-- apexcharts -->

    <script>
        $(function(e) {
            //file export datatable
            var table = $('#example').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis'],
                responsive: true,
                language: {
                    searchPlaceholder: 'ابحث هنا',
                    sSearch: '',
                    lengthMenu: '_MENU_ ',
                }
            });
            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');

            $('#example1').DataTable({
                language: {
                    searchPlaceholder: 'ابحث هنا',
                    sSearch: '',
                    lengthMenu: '_MENU_',
                }
            });
            $('#example2').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'ابحث هنا',
                    sSearch: '',
                    lengthMenu: '_MENU_',
                }
            });
            var table = $('#example-delete').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'ابحث هنا',
                    sSearch: '',
                    lengthMenu: '_MENU_',
                }
            });
            $('#example-delete tbody').on('click', 'tr', function() {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });

            $('#button').click(function() {
                table.row('.selected').remove().draw(false);
            });

            //Details display datatable
            $('#example-1').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'ابحث هنا',
                    sSearch: '',
                    lengthMenu: '_MENU_',
                },
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function(row) {
                                var data = row.data();
                                return 'Details for ' + data[0] + ' ' + data[1];
                            }
                        }),
                        renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                            tableClass: 'table border mb-0'
                        })
                    }
                }
            });
        });
    </script>
@endsection
