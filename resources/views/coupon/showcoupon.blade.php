@extends('layouts.master')

@section('title')
    عرض المناطق
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


@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            عرض
        @endslot
        @slot('title')
            الموظفين
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

                    <h4 class="card-title">عرض الكوبونات</h4>
                    <p class="card-title-desc">

                    </p>

                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">


                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example" class="table table-striped my-3 w-100" role="grid"
                                    aria-describedby="datatable_info">
                                    <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>الكود</th>
                                            <th>نوع الخفيض</th>
                                            <th>التخفيض</th>
                                            <th>الحد الادني للشراء</th>
                                            <th>الحد الاقصي للشراء</th>
                                            <th>عدد مرات استخدام الكوبون</th>
                                            <th> حد استخدام لمستخدم واحد</th>
                                            <th> نشط</th>
                                            <th>ناريخ الانتهاء</th>
                                            <th> العديلات</th>
                                        </tr>

                                    </thead>
                                    <tbody>


                        <?php $i = 0; ?>
                        @foreach ($coupons as $coupon)
                            <?php $i++; ?>
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $coupon->name }}</td>
                                            <td>{{ $coupon->code }}</td>

                                            <td>{{ $coupon->type_discount }}</td>
                                            <td>{{ $coupon->discount }}</td>
                                            <td>{{ $coupon->min_price }}</td>
                                            <td>{{ $coupon->max_price }}</td>

                                            <td>{{ $coupon->limit }}</td>
                                            <td>{{ $coupon->limit_user }}</td>
                                            <td> <a href="">
                                                <input type="checkbox" id="switch{{ $coupon->id }}" data-coupon-id="{{ $coupon->id }}" switch="info" data-url="{{ route('coupon.updateStatus', $coupon->id) }}" {{ $coupon->is_active ? 'checked' : '' }}>
                                                <label for="switch{{ $coupon->id }}" data-on-label="نعم" data-off-label="لا"></label></a>
                                            </td>
                                            <td>{{ $coupon->end_date }}</td>
                                            <td>
                                                <ul class="list-unstyled hstack gap-1 mb-0">
                                                    {{-- <li data-bs-toggle="tooltip" data-bs-placement="top" title="تعديل ">
                                                        <a href="" class="btn btn-sm btn-soft-primary"><i
                                                                class="mdi mdi-pencil-outline"></i></a>
                                                    </li> --}}

                                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="حذف">
                                                        <a href="" title="حذف"
                                                            class="btn btn-sm btn-soft-danger"><i
                                                                class="mdi mdi-delete-outline"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                    @endforeach



                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    @endsection

@section('script')


{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

<script>
    $(function() {
        $('input[type=checkbox][switch=info]').change(function() {
            var checkbox = $(this);
            var url = checkbox.data('url');
            var is_active = checkbox.prop('checked');

            // Get the CSRF token
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Send a PATCH request to update the is_active status
            $.ajax({
                url: url,
                type: "PATCH",
                data: {
                    is_active: is_active ? 1 : 0,
                },
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                },
                success: function(data) {
                    console.log(data);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>

@endsection
@section('js')


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
