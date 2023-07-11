@extends('layouts.master')
@section('title')
    إضافة قسم فرعي جديد
@stop
@section('css')
    <link href="{{ URL::asset('build/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">إضافة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    قسم فرعي</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection


@section('content')


    @if (session('Add'))
        <div class="alert alert-success">
            {{ session('Add') }}
        </div>
    @endif

    <section class="content">
        <div class="row">


            <div class="col-12">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <form method="post" action="{{ route('subcategory.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <h5>القسم الرئيسي <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="cate_id" id="select" class="form-control">
                                                <option value="" selected disabled>-- اختر القسم الرئيسي--</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('cate_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <h5 for="name">القسم الفرعي <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="name" name="name" class="form-control">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <div class="fallback">
                                        <img src="" id="mainThmb" alt="">
                                        <br><br>
                                        <input type="file" name="pic" onChange="mainThamUrl(this)">

                                        @error('pic')
                                            <span class="text-danger" >{{ $message }}</span>
                                        @enderror
                                </div>
                                <div class="dz-message needsclick">
                                    <div class="mb-3">
                                        <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                    </div>

                                    <h4>ادخل الصوره هنا</h4>
                                </div>
                            </div>
                                <div class="text-center mt-4 mb-2">
                                    <input type="submit" class="btn btn-primary waves-effect waves-light" value="حفظ">
                                </div>
                            </form>

                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div>

        <!-- /.row -->
    </section>

@endsection
@section('js')

@section('script')
    <script type="text/javascript">
        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThmb').attr('src', e.target.result).width(130).height(150);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

{{-- <script src="{{ asset('build/libs/dropzone/min/dropzone.min.js') }}"></script>

<script src="{{ asset('build/js/app.js') }}"></script> --}}
@endsection
