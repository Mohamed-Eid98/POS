@extends('layouts.master')
@section('title')
    تعديل قسم رئيسي
@stop
@section('css')
<link href="{{ asset('build/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">تعديل</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    قسم رئيسي</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection


@section('content')


@if (session('edit'))
<div class="alert alert-info">
    {{ session('edit') }}
</div>
@endif


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">تعديل القسم الرئيسي</h4>
                <p class="card-title-desc">
                </p>

                <div>

                    <form action="{{ route('category.update') }}" class="dropzone" method="POST" enctype="multipart/form-data" >
                        @csrf

                    <input type="hidden" name="id" value="{{ $category->id }}">

                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">اسم القسم الرئيسي<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="formrow-firstname-input" name="name" value="{{ $category->name }}">
                                    @error('name')
                                        <span class="text-danger" >{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="fallback">

                                @if ($category->getFirstMediaUrl('images'))
                                <img src="{{  $category->getFirstMediaUrl('images') }}" style="width: 130px;height:150px" id="mainThmb" alt="">
                                <br><br>
                                @else
                                <img src="" id="mainThmb" alt=""> <br><br>

                                @endif

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



@endsection
