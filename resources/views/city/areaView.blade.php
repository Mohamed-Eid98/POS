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
            المناطق
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
        <div class="col-sm-12">
            <table id="example" class="table table-striped my-3 w-100" role="grid" aria-describedby="datatable_info"
                style="width: 1566px;">
                <thead>
                    <tr role="row">
                        <th>#</th>
                        {{-- <th>المحافظات</th> --}}
                        <th>المنطقه</th>
                        <th>التوصيل</th>
                        <th>التعديلات</th>
                    </tr>

                </thead>



                <tbody>

                    <?php $i = 0;
                    $prevCountry = null; ?>
                    @foreach ($cities as $city)
                        @foreach ($city->areas as $area)
                            @if ($prevCountry !== $city->general_title)
                                <tr>
                                    <td colspan="4">{{ $city->general_title }} </td>
                                </tr>
                                @php
                                    $prevCountry = $city->general_title;
                                @endphp
                            @endif




                            <?php $i++; ?>
                            <tr>
                                <td>{{ $i }}</td>

                                <td>
                                    {{ $area->general_title }}
                                </td>
                                <td>
                                    {{ $area->shipping_cost }}
                                </td>
                                <td>
                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="تعديل ">
                                            <a href="{{ route('area.edit', $area->id) }}"
                                                class="btn btn-sm btn-soft-primary"><i
                                                    class="mdi mdi-pencil-outline"></i></a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="حذف">
                                            <a href="{{ route('area.delete', $area->id) }}" title="حذف"
                                                class="btn btn-sm btn-soft-danger"><i
                                                    class="mdi mdi-delete-outline"></i></a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">عرض المناطق</h4>
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
                                            {{-- <th>المحافظات</th> --}}
                                            <th>المنطقه</th>
                                            <th>التوصيل</th>
                                            <th>التعديلات</th>
                                        </tr>

                                    </thead>


                                    <tbody>

                                        <?php $i = 0;
                                        $prevCountry = null; ?>
                                        @foreach ($cities as $city)
                                            @foreach ($city->areas as $area)
                                                @if ($prevCountry !== $city->general_title)
                                                    <tr>
                                                        <td colspan="4">{{ $city->general_title }} </td>
                                                    </tr>
                                                    @php
                                                        $prevCountry = $city->general_title;
                                                    @endphp
                                                @endif




                                                <?php $i++; ?>
                                                <tr>
                                                    <td>{{ $i }}</td>

                                                    <td>
                                                        {{ $area->general_title }}
                                                    </td>
                                                    <td>
                                                        {{ $area->shipping_cost }}
                                                    </td>
                                                    <td>
                                                        <ul class="list-unstyled hstack gap-1 mb-0">
                                                            <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="تعديل ">
                                                                <a href="{{ route('area.edit', $area->id) }}"
                                                                    class="btn btn-sm btn-soft-primary"><i
                                                                        class="mdi mdi-pencil-outline"></i></a>
                                                            </li>

                                                            <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="حذف">
                                                                <a href="{{ route('area.delete', $area->id) }}"
                                                                    title="حذف" class="btn btn-sm btn-soft-danger"><i
                                                                        class="mdi mdi-delete-outline"></i></a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
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
    <script>
     @section('script')
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
