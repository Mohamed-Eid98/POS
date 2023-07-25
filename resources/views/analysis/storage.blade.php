@extends('layouts.master')

@section('title')
    عرض المخزون
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
            المخزون
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
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">عرض المخزون</h4>
                    <p class="card-title-desc">

                    </p>

                    <form action="{{ route('storage.search') }}" method="POST"  class="row gy-2 gx-3 align-items-center">
                        @csrf

                        <div class="row">
                            <!-- start 1st row  -->

                            <div class="col-md-2">

                                <div class="form-group">
                                    <div class="controls">
                                        <select class="form-select-left" style="width:100%;" id="autoSizingSelect" name="status">
                                        {{-- <select name="status" id="select" class="form-select-left" style="width: 50%"> --}}
                                            <option value="" selected disabled><b>الفرز حسب حالة المخزون</b></option>
                                            <option value="unavailable">غير متوفر في المخزون</option>
                                            <option value="lowavailable">مخزون منخفض</option>
                                            <option value="available">متوفر في المخزون</option>
                                        </select>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div> <!-- end col md 6 -->
                            <div class="col-md-1">


                                <div class="col-sm-auto">
                                    <button type="submit" class="btn btn-info w-md">تصفيه</button>
                                </div>

                            </div> <!-- end col md 6 -->



                        </div> <!-- end 1st row  -->

                        <br>
                    </form>
                    <br>




                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example" class="table table-striped my-3" role="grid"
                                aria-describedby="datatable_info" style="width: 100%">

                                <thead>
                                    <tr role="row">
                                        <th>#</th>
                                        <th>المنتج </th>
                                        <th>رمز المنتج (SKU) </th>
                                        <th> حاله المنتج</th>
                                        <th>المخزون</th>
                                        <th>التعديلات</th>
                                    </tr>

                                </thead>


                                <tbody>

                                    <?php $i = 0; ?>
                                    @foreach ($products as $product)
                                        <?php $i++; ?>
                                        <tr>
                                            <td>{{ $i }}</td>

                                            <td> {{ $product->name }} </td>
                                            <td>
                                                <span class="badge text-bg-danger">{{ $product->code }}</span>

                                            </td>
                                            <td>


                                                @if ( $product->colors->sum('pivot.is_stock') > 0)
                                                <b><span style="color: rgb(164, 215, 46)"> متوفر في المخزون</span></b>

                                                @else
                                                <b><span style="color:  red">غير متوفر في
                                                    المخزون</span></b>
                                                @endif


                                            </td>

                                <td>
                                    @if ( $product->colors->count('pivot.is_stock') !=0)
                                            @if (($product->colors->sum('pivot.is_stock')) / $product->colors->count('pivot.is_stock') > 10)
                                            <b><span class="badge text-bg-success" >
                                                {{ ($product->colors->sum('pivot.is_stock')) / $product->colors->count('pivot.is_stock') }}
                                            </span></b>
                                            @elseif (($product->colors->sum('pivot.is_stock')) / $product->colors->count('pivot.is_stock') < 10 && ($product->colors->sum('pivot.is_stock')) / $product->colors->count('pivot.is_stock') > 5)
                                            <b><span class="badge text-bg-warning">
                                                {{ ($product->colors->sum('pivot.is_stock')) / $product->colors->count('pivot.is_stock') }}
                                            </span></b>
                                            @else
                                            <b><span class="badge text-bg-danger">
                                                {{ ($product->colors->sum('pivot.is_stock')) / $product->colors->count('pivot.is_stock') }}
                                            </span></b>
                                            @endif
                                        @else
                                        <b><span class="badge text-bg-danger">
                                            {{ ($product->colors->sum('pivot.is_stock')) }}
                                        </span></b>
                                   @endif

                                <td>
                                                <ul class="list-unstyled hstack gap-1 mb-0">

                                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                        <a href="{{ route('storage.delete', $product->id) }}"
                                                            title="حذف" class="btn btn-sm btn-soft-danger"><i
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



                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>

    </div> <!-- end col -->
    </div>
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
