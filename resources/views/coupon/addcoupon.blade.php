@extends('layouts.master')

@section('title') إضافة كوبون@endsection

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
            كويون
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

                    <h4 class="card-title">إضافة كوبون</h4>
                    <p class="card-title-desc">
                    </p>

                    <div>

                        <form action="{{ route('coupon.update') }}" class="dropzone" method="POST">
                            @csrf


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5> الاسم<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5> الكود<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="code" required>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <br>

                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5> نوع التخفيض</h5>
                                        <div class="controls">
                                            <select name="type_discount" id="select" class="form-control" required >
                                                <option value="" selected disabled>-- اختر النوع --</option>
                                                <option value="percentage" > نسبه مئويه </option>
                                                <option value="price" > سعر </option>
                                            </select>
                                            @error('type_discount')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5> التخفيض<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="number" class="form-control" name="discount" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5> الحد الادني للشراء<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="number" class="form-control" name="min_price" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5> الحد الأقصي للشراء<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="number" class="form-control" name="max_price" required>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5> حد استخدام هذا الكوبون<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="number" class="form-control" name="limit" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5> حد استخدام لمستخدم واحد<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="number" class="form-control" name="limit_user" required>
                                        </div>
                                    </div>
                                </div>



                            </div>

<br>
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <label class="form-check-label" for="formCheckcolor1"> هل هذا الكوبون نشط ؟</label>
                                        <input class="form-check-input" type="checkbox" name="is_active" id="formCheckcolor1" value="1" >
                                    </fieldset>
                                </div>

                            </div>
                            <br>
                            <div class="row">

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <h5> تاريخ الانتهاء<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" class="form-control" name="end_date" required>
                                        </div>
                                        @error('end_date')
                                        <span class="text-danger">{{ $message }}</span>
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

@endsection




@section('js')






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
