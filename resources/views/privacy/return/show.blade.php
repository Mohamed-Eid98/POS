@extends('layouts.master')

@section('title')
    عرض سياسة الارجاع
@endsection

@section('css')
    <!-- Plugins css -->
    <link href="{{ URL::asset('build/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            عرض
        @endslot
        @slot('title')
        سياسة الارجاع
        @endslot
    @endcomponent

    @if (session('edit'))
        <div class="alert alert-success">
            {{ session('edit') }}
        </div>
    @endif
    @if (session('delete'))
        <div class="alert alert-success">
            {{ session('delete') }}
        </div>
    @endif


    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">عرض سياسه</h4>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        <form method="post">
                            <div class="row">
                                <div class="col-md-3">
                                <div class="form-group">
                                    <h5> الاسم <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="{{ $privacy->title }}" readonly>
                                    </div>
                                </div>
                                </div>

                                <div class="col-md-7">
                                </div>

                                <div class="col-md-2">


                                    <div class="form-group">
                                    <div class="controls">
                                        <a href="{{ route('privacy.return.delete' , $privacy->id) }}"  class="btn btn-outline-danger waves-effect waves-light">حذف</a>
                                        <a href="{{ route('privacy.return.edit' , $privacy->id) }}"  class="btn btn-outline-primary waves-effect waves-light">تعديل</a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <h4 class="card-title my-3">المحتوي </h4>


                            <textarea id="elm1" name="area" readonly>{!! $privacy->description !!}</textarea>
                            {{-- <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5 my-3 text-center"
                                    value="اضافة سياسة">
                            </div> --}}
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
