@extends('layouts.master')

@section('title')
    إضافة المقاسات والوان
@endsection

@section('css')
    <!-- Plugins css -->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->


    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"
        type="text/css">


@endsection




@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            إضافة
        @endslot
        @slot('title')
            المقاسات والالوان
        @endslot
    @endcomponent

    @if (session('add'))
        <div class="alert alert-success">
            {{ session('add') }}
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">إضافة مقاسات والوان المنتج</h4>
                    <p class="card-title-desc">
                    </p>

                    <div>

                        <form action="{{ route('product.addcolorandsize.store') }}" method="POST" class="dropzone" >
                            @csrf


                            <div class="col-md-12">

                                <div class="form-group">
                                    <h4>ادخل لون جديد<span class="text-danger">*</span></h4>
                                    <div class="controls">

                                        <div class="controls">
                                            <input type="text" name="color" class="form-control my-3" />
                                            @error('color')
                                                <span class="text-danger"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>


                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12">

                                <div class="mb-3">
                                    <h4>ادخل مقاس جديد<span class="text-danger">*</span></h4>
                                    <div class="controls">
                                        <input type="text" name="size" class="form-control my-2" />
                                        @error('size')
                                            <span class="text-danger"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                </div>
                            </div>








                    </div>
                    <div class="text-center mt-4">
                        <input type="submit" class="btn btn-primary waves-effect waves-light" value="حفظ">
                    </div>
                    </form>






                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->




    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">عرض الالوان</h4>
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
                                            <th>الاسم</th>

                                            <th>التعديلات</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>

                                        <?php $i++; ?>
@foreach ($colors as $color)

                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td> {{ $color->name }} </td>


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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">عرض الاحجام</h4>
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
                                            <th>الحجم</th>

                                            <th>التعديلات</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>

                                        <?php $i++; ?>
@foreach ($sizes as $size)

                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td> {{ $size->name }} </td>


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






