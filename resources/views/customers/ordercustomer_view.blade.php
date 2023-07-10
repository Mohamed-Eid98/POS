@extends('layouts.master')

@section('title')
    عرض الطلبات
@endsection

@section('css')
    <!-- DataTables -->
    {{-- <link
        href="{{ asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css') }}" />
    <link
        href="{{ asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css') }}" />


    <!-- Responsive datatable examples -->
    <link href="{{ asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" /> --}}
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            عرض
        @endslot
        @slot('title')
            الطلبات
        @endslot
    @endcomponent


    @if (session('delete'))
        <div class="alert alert-success">
            {{ session('delete') }}
        </div>
    @endif
    @if (session('edit'))
        <div class="alert alert-success">
            {{ session('edit') }}
        </div>
    @endif


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">عدد الطلبات الخاصه بالموزع</h4>
                    <p class="card-title-desc">

                    </p>

                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">



                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-rep-plugin">
                                <div class="" data-pattern="priority-columns">
                                    <form action="{{ route('orders.payments') }}" method="POST">
                                        @csrf
                                        <table id="example" class="table table-striped w-100">
                                            <thead>
                                                <tr>
                                                    <th></th>

                                                    <th data-priority="1">رقم الفاتوره</th>
                                                    <th data-priority="2">الحاله</th>
                                                    <th data-priority="3">سعر فاتوره التوصيل</th>
                                                    <th data-priority="4"> اختيار</th>

                                                </tr>

                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $order)
                                                    <tr>
                                                        <td></td>

                                                        <td>{{ $order->invoice_no }} </td>
                                                        <td>{{ $order->status }} </td>
                                                        <td>{{ $order->final_total }}</td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" name="name[{{ $order->id }}]"
                                                                    value="{{ $order->final_total }}">
                                                            </label>
                                                        </td>


                                                    </tr>
                                                @endforeach




                                            </tbody>
                                        </table>


                                        <div class="row">
                                            <div class="col-md-6 m-auto">


                                                <div class="row">
                                                    {{-- <input type="hidden" name="user_id" value="{{ $order->user_id }}"> --}}
                                                    <input type="text" id="total" name="total" readonly
                                                        class="form-control form-control-rounded is-valid form-control-lg my-3 ">
                                                    <div class="col-md-4  m-auto"><input type="date" name="date_at"
                                                            value="{{ now() }}"
                                                            class="form-control form-control-rounded form-control-lg ">
                                                    </div>
                                                </div>


                                                {{-- <input type="text" readonly id="total" > --}}
                                            </div>

                                        </div>
                                        {{-- <div class="row">
                                        <div class="col-md-3 m-auto"><input type="date"></div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center
                                                            mt-4 mb-2">
                    <input type="submit" class="btn btn-primary waves-effect waves-light" value="حفظ">
                </div>
                {{-- <div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div> --}}
                </form>

            </div>
        </div>
    </div> <!-- end col -->
@endsection


@section('js')
<script>
    $(function(e) {
        //file export datatable
        var table = $('#example').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdff', 'colvis'],
            responsive: true,
            language: {
                searchPlaceholder: 'البحث ...',
                sSearch: '',
                lengthMenu: '_MENU_ ',
            }
        });
        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');

        $('#example1').DataTable({
            language: {
                searchPlaceholder: 'البحث ...',
                sSearch: '',
                lengthMenu: '_MENU_',
            }
        });
        $('#example2').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'البحث ...',
                sSearch: '',
                lengthMenu: '_MENU_',
            }
        });
        var table = $('#example-delete').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'البحث ...',
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
                searchPlaceholder: 'البحث ...',
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
