@extends('layouts.master')
@section('title')
    عرض جميع الطلبات
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">عرض </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    جميع الطلبات</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection


@section('content')
    @if (session('delete'))
        <div class="alert alert-success">
            {{ session('delete') }}
        </div>
    @endif
    @if (session('edit'))
        <div class="alert alert-info">
            {{ session('edit') }}
        </div>
    @endif


    <div class="col-xl-12">
        <div class="card ">
            <h4 class="card-title">عرض جميع الطلبات</h4>





            <div class="card-header pb-0">
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped my-3" style="width: 100%">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">#SL</th>
                            <th class="border-bottom-0">الطلبات</th>
                            <th class="border-bottom-0">التاريخ</th>
                            <th class="border-bottom-0">اسم العميل</th>
                            <th class="border-bottom-0">الحاله</th>
                            <th class="border-bottom-0">الكل</th>
                            <th class="border-bottom-0">طالبات الحاله</th>

                            <th class="border-bottom-0"> حدث</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($orders as $order)
                            <?php $i++; ?>

                            <tr>
                                <td>{{ $i }}</td>
                                <td> <a href=""> {{ $order->invoice_no }} </a> </td>
                                <td>{{ $order->created_at->diffForHumans() }} </td>
                                <td>
                                    @if ($order->customer)
                                        {{ $order->customer->name }}
                                    @else
                                        No name exist
                                    @endif
                                </td>
                                <td>
                                    @if ($order->status == 'Paid')
                                        <span class="badge rounded-pill text-bg-danger"> مدفوع </span>
                                    @else
                                        <span class="badge rounded-pill text-bg-primary"> غير
                                            مدفوع </span>
                                    @endif
                                </td>
                                <td>{{ $order->final_total }}EG </td>

                                <td>
                                    @if ($order->status == 'Pending')
                                        <span class="badge rounded-pill text-bg-secondary"> معلق </span>
                                    @elseif ($order->status == 'Paid')
                                        <span class="badge rounded-pill text-bg-primary"> تم الدفع  </span>
                                    @elseif ($order->status == 'InPrograss')
                                        <span class="badge rounded-pill text-bg-warning">  قيد المراجعه </span>
                                    @elseif ($order->status == 'Rejected')
                                        <span class="badge rounded-pill text-bg-danger"> تم الرفض </span>
                                    @elseif ($order->status == 'Cancelled')
                                        <span class="badge rounded-pill text-bg-success"> تم الإلغاء </span>
                                    @elseif ($order->status == 'Delivered')
                                        <span class="badge rounded-pill text-bg-info"> تم التوصيل </span>
                                    @else
                                        <span class="badge rounded-pill text-bg-success"> تم التسليم </span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('orders.paid', $order->id) }}" title="Product Details Data"
                                        class="btn btn-sm btn-soft-primary"><i class="mdi mdi-eye-outline"></i></a>
                                    @if ($order->status == 'Paid')
                                        <a href="{{ route('orders.unpaid', $order->id) }}"
                                            class="btn btn-sm btn-soft-danger" title=" غير مدفوع"><i
                                                class="fa fa-arrow-up"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('orders.paid', $order->id) }}" class="btn btn-sm btn-soft-info"
                                            title="ادفع الان"><i class="fa fa-arrow-up"></i> </a>
                                    @endif

                                    {{-- <a href="{{ route('order.edit',$order->id) }}" title="تعديل" class="btn btn-info">
                                <i class="las la-pen"></i></a>
                                <a href="{{ route('order.delete',$order->id) }}"
                                    class="btn btn-danger" title="حذف">
                                    <i class="fa fa-trash"></i></a> --}}
                                </td>

                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>




@endsection

@section('script')


<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<script>
    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var section_name = button.data('section_name')
        var description = button.data('description')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #section_name').val(section_name);
        modal.find('.modal-body #description').val(description);
    })
</script>
<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var section_name = button.data('section_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #section_name').val(section_name);
    })
</script>
@endsection

@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->

    <script>
        $(function(e) {
            //file export datatable
            var table = $('#example').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis'],
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ ',
                }
            });
            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');

            $('#example1').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_',
                }
            });
            $('#example2').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_',
                }
            });
            var table = $('#example-delete').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
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
                    searchPlaceholder: 'Search...',
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
