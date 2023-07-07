@extends('layouts.master')

@section('title')
    إضافةاشعار
@endsection

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
            اشعار
        @endslot
    @endcomponent

    @if (session('add'))
        <div class="alert alert-success">
            {{ session('add') }}
        </div>
    @endif


    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">اضافه سياسات</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">سياسة</a></li>
                        <li class="breadcrumb-item active">اضافه سياسة</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row h-100">
        <div class="card">
            <div class="card-body">
                <div class="col-md-12">
                    <form method="post">

                        <div class="form-group">
                            <h5> معلومات <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="cate_id" id="select" class="form-control">
                                    <option value="" selected disabled>-- اختر--</option>
                                    <option value="">mohamed</option>
                                </select>
                                @error('cate_id')
                                    <span class="text-danger">
                                        {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <h4 class="card-title my-3">المحتوي </h4>


                        <textarea id="elm1" name="area" class="h-100"></textarea>
                        <div class="text-xs-right ">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5 my-3 text-center "
                                value="اضافة سياسة">
                        </div>
                    </form>

                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    @endsection
    @section('script')
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

        <!--tinymce js-->
        <script src="{{ asset('assets/libs/tinymce/tinymce.min.js') }}"></script>

        <!-- init js -->
        <script src="{{ asset('assets/js/pages/form-editor.init.js') }}"></script>
    @endsection

    <!-- end main content-->
