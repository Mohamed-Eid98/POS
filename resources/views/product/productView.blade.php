@extends('layouts.master')
@section('title')
    عرض الاقسام الرئيسيه
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">عرض </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    قسم رئيسي</span>
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

            <div class="card-header pb-0">
            </div>
            <div class="card-body">
                <table id="example1" class="table key-buttons text-md-nowrap">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">#</th>
                        <th class="border-bottom-0">صورة المنتج </th>
                        <th class="border-bottom-0">اسم المنتج </th>
                        <th class="border-bottom-0">الكود</th>
                        <th class="border-bottom-0">السعر قبل الخصم </th>
                        <th class="border-bottom-0">السعر بعد الخصم </th>
                        <th class="border-bottom-0">الكميه</th>
                        <th class="border-bottom-0"> actions</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($products as $product)
                    <?php $i++; ?>

                    <tr>
                        <td>{{ $i }}</td>
                        <td><img src="{{ asset('uploads/'.$product->product_photo) }}" style="width:50px; height:40px;" </td>
                        <td>{{ $product->name }} </td>
                        <td>{{ $product->code }} </td>
                        <td>{{ $product->selling_price }}جنيه </td>
                        <td>{{ $product->min_price }} جنيه</td>
                        <td>{{ $product->product_qty }} </td>
                        <td>
                            <a href="{{ route('product.edit',$product->id) }}" title="تعديل" class="btn btn-info">
                                <i class="las la-pen"></i></a>
                                <a href="{{ route('product.delete',$product->id) }}"
                                    class="btn btn-danger" title="حذف">
                                    <i class="fa fa-trash"></i></a>
                        </td>

                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>



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
