@extends('layouts.master')

@section('title')
    عرض المنتجات
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
            المنتجات
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

                    <h4 class="card-title">عرض المنتجات </h4>
                    <p class="card-title-desc">

                    </p>

                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example" class="table table-striped my-3" role="grid"
                                    aria-describedby="datatable_info" style="width: 100%">
                                    <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th>الصوره</th>
                                            <th>الاسم </th>
                                            <th>رمز المنتج (SKU) </th>
                                            <th>المخزون</th>
                                            <th>السعر </th>
                                            <th> التصينفات</th>
                                            {{-- <th>الحد الادني </th>
                                            <th>معدل الزياده </th>
                                            <th>عدد التكرار</th>
                                            <th>الحد الاقصي </th>
                                            <th>الكميه </th>
                                            <th>جديد </th>
                                            <th>الاكثر مبيعاً </th>
                                            <th> العروض </th>
                                            <th>وصل حديثاً </th> --}}
                                            <th>التعديلات</th>
                                        </tr>

                                    </thead>


                                    <tbody>

                                        <?php $i = 0; ?>
                                        @foreach ($products as $product)
                                            <?php $i++; ?>
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>
                                                    @if ($product->getFirstMediaUrl('images'))
                                                        <img src="{{ $product->getFirstMediaUrl('images') }}"
                                                            style="width: 60px;height:50px" alt="{{ $product->title }}"
                                                            class="img-fluid">
                                                    @else
                                                        <img src="{{ asset('uploads/on-C100969_Image_01.jpeg') }}"
                                                            style="width: 60px;height:50px" alt="{{ $product->title }}"
                                                            class="img-fluid">
                                                    @endif
                                                </td>
                                                <td> {{ $product->name }} </td>
                                                <td>
                                                    <span class="badge text-bg-danger">{{ $product->code }}</span>

                                                </td>
                                                <td>
                                                    @if ($product->product_qty == 0)
                                                           <b><span style="color:  rgb(164, 215, 46)">غير متوفر في المخزون</span></b>
                                                    @else
                                                    <b><span style="color: rgb(164, 215, 46)"> متوفر في المخزون</span></b>

                                                    @endif
                                                </td>
                                                <td> {{ $product->price }} د.ع. </td>
                                                <td>
                                                    @if ($product->subcategory)
                                                        <a href="{{ route('product.show.subcategory', $product->id) }}">
                                                            {{ $product->subcategory->category->name }},{{ $product->subcategory->name }} </a>
                                                    @else
                                                        لا يوجد
                                                    @endif
                                                </td>

                                                {{-- <td> {{ $product->min_price }} د.ع. </td>
                                                <td> {{ $product->increase_ratio }} د.ع. </td>
                                                <td> {{ $product->repeat_times }} </td>
                                                <td>
                                                    {{ $product->min_price + ($product->repeat_times + 1) * $product->increase_ratio }}
                                                    د.ع.

                                                </td>
                                                <td> {{ $product->product_qty }} </td>
                                                <td>
                                                    @if ($product->is_new == 1)
                                                        <span class="badge text-bg-secondary">نعم</span>
                                                    @else
                                                        <span class="badge text-bg-danger">لا</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($product->is_best_seller == 1)
                                                        <span class="badge text-bg-secondary">نعم</span>
                                                    @else
                                                        <span class="badge text-bg-danger">لا</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($product->is_on_sale == 1)
                                                        <span class="badge text-bg-secondary">نعم</span>
                                                    @else
                                                        <span class="badge text-bg-danger">لا</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($product->is_new_arrival == 1)
                                                        <span class="badge text-bg-secondary">نعم</span>
                                                    @else
                                                        <span class="badge text-bg-danger">لا</span>
                                                    @endif
                                                </td> --}}

                                                <td>



                                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="تعديل ">
                                                            <a href="{{ route('product.edit', $product->id) }}"
                                                                class="btn btn-sm btn-soft-primary"><i
                                                                    class="mdi mdi-pencil-outline"></i></a>
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="ارسال اشعار">
                                                            @if ($product->product_qty == 0)
                                                                <a href="{{ route('product.quentity.zero', $product->id) }}"
                                                                    class="btn
                                                                    btn-sm btn-soft-info"><i
                                                                        class="fas fa-bell"></i></a>
                                                            @elseif ($product->product_qty < 10)
                                                                <a href="{{ route('product.quentity.ten', $product->id) }}"
                                                                    class="btn
                                                                btn-sm btn-soft-info"><i
                                                                        class="fas fa-bell"></i></a>
                                                            @else
                                                            @endif
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                            <a href="{{ route('product.delete', $product->id) }}"
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
                        {{-- <div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div> --}}

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
