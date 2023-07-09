@extends('layouts.master')

@section('title') إضافة دور الموظف@endsection

@section('css')
    <!-- Plugins css -->
    <link href="{{ URL::asset('build/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection




@section('content')

    @component('components.breadcrumb')
        @slot('li_1')
            إضافة
        @endslot
        @slot('title')
            دور موظف
        @endslot
    @endcomponent










    @if (session('Add'))
        <div class="alert alert-success">
            {{ session('Add') }}
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">إضافة دور الموظف</h4>
                    <p class="card-title-desc">
                    </p>

                    <div>

                        <form action="{{ route('employee.update.role') }}" class="dropzone" method="POST"
                            enctype="multipart/form-data">
                            @csrf


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5> الاسم <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-12">
                                <h4 for="formrow-firstname-input" class="form-label my-3"> المهام<span
                                        class="text-danger">*</span></h4>
                                <div class="row">

                                    <div class="col-md-3"> <input type="checkbox" id="checkbox_3" name="permissions[]"
                                            value="1">
                                        <label for="checkbox_3">اداره الاقسام</label>
                                    </div>
                                    <div class="col-md-3"> <input type="checkbox" id="checkbox_3" name="permissions[]"
                                            value="2">
                                        <label for="checkbox_3">اداره الطلبات</label>
                                    </div>
                                    <div class="col-md-3"> <input type="checkbox" id="checkbox_3" name="permissions[]"
                                            value="3">
                                        <label for="checkbox_3"> ادارة الاشعارات</label>
                                    </div>
                                    <div class="col-md-3"> <input type="checkbox" id="checkbox_3" name="permissions[]"
                                            value="5">
                                        <label for="checkbox_3">ادارة السياسات</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"> <input type="checkbox" id="checkbox_3" name="permissions[]"
                                            value="4">
                                        <label for="checkbox_3"> ادارة العملاء</label>
                                    </div>
                                    <div class="col-md-3"> <input type="checkbox" id="checkbox_3" name="permissions[]"
                                            value="8">
                                        <label for="checkbox_3"> لوحه التحكم</label>
                                    </div>
                                    <div class="col-md-3"> <input type="checkbox" id="checkbox_3" name="permissions[]"
                                            value="7">
                                        <label for="checkbox_3"> السوشيل ميديا </label>
                                    </div>
                                    <div class="col-md-3"> <input type="checkbox" id="checkbox_3" name="permissions[]"
                                            value="6">
                                        <label for="checkbox_3"> المحافظات</label>
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

@endsection




@section('js')


@section('script')




    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/libs/spectrum-colorpicker2/spectrum.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('assets/libs/@chenfengyuan/datepicker/datepicker.min.js') }}"></script>

    <!-- form advanced init -->
    <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>

    <script src="{{ asset('assets/js/app.js') }}"></script>


@endsection
