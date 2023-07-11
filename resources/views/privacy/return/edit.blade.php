@extends('layouts.master')

@section('title')
    تعديل سياسة الارجاع
@endsection

@section('css')
    <!-- Plugins css -->
    <link href="{{ URL::asset('build/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            تعديل
        @endslot
        @slot('title')
            سياسة الارجاع
        @endslot
    @endcomponent



    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">تعديل سياسه</h4>


            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        <form method="post" action="{{ route('privacy.return.update') }}">
                            @csrf

                            <input type="hidden" name="id" value="{{ $privacy->id }}">

                            <div class="row">
                                <div class="col-md-3">
                                <div class="form-group">
                                    <h5> الاسم <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" readonly value="{{ $privacy->title }}">
                                    </div>
                                </div>
                                </div>

                                <div class="col-md-8">
                                </div>

                                <div class="col-md-1">

                                <div class="text-align: left">

                                    <div class="form-group">
                                    <div class="controls">
                                        {{-- <input type="button" value="حذف" class="form-group" >
                                        <input type="button" value="تعديل" class="form-group" > --}}
                                        </div>
                                    </div>
                                </div>
                                </div>

                            </div>

                            <h4 class="card-title my-3">المحتوي </h4>


                            <textarea id="elm1" name="area">{!! $privacy->description !!}</textarea>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5 my-3 text-center"
                                    value="تعديل سياسة">
                            </div>
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    @endsection

@section('script')



    <!--tinymce js-->
    <script src="{{ asset('assets/libs/tinymce/tinymce.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('assets/js/pages/form-editor.init.js') }}"></script>


@endsection
