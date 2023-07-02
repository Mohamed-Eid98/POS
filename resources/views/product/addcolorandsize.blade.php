@extends('layouts.master')

@section('title')
    إضافة المقاسات والوان
@endsection

@section('css')
    <!-- Plugins css -->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">


    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assets/libs/spectrum-colorpicker2/spectrum.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/libs/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/libs/@chenfengyuan/datepicker/datepicker.min.css') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />

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

                        <form action="{{ route('product.addcolorandsize.store') }}" class="dropzone" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div class="mb-3">
                                <div class="form-group">
                                    <h5> اسم المنتح<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="product_id" id="select" class="form-control">
                                            <option value="" selected disabled>-- اختر المنتج --</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach

                                        </select>
                                        @error('product_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <h5>اللون <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="color" id="select" class="form-control">
                                            <option value="" selected disabled>-- اختر اللون
                                                --
                                            </option>
                                            @foreach ($colors as $color)
                                                <option value="{{ $color->id }}">
                                                    {{ $color->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('color')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label class="form-label">المقاس </label>

                                    <select name="size[]" class="select2 form-control select2-multiple" multiple="multiple"
                                        data-placeholder="Choose ...">

                                        @foreach ($sizes as $size)
                                            <option value="{{ $size->id }}">
                                                {{ $size->name }}
                                            </option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>



                            <div class="box">
                                <div class="box-header with-border">
                                    <h4 class="box-title">إضافة صور </h4>
                                </div>
                                <hr>
                                <!-- start 2nd row  -->



                                <div class="fallback">
                                    {{-- <img src="" id="mainThmb" alt=""> --}}
                                    <div class="row" id="preview_image">

                                    </div>
                                    <br>
                                    <input type="file" name="multi_img[]" class="form-control" multiple=""  id="multiImg" >
                                    @error('multi_image')
                                        <span class="text-danger" >{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="dz-message needsclick">
                                    <div class="mb-3">
                                        <i class="display-4 text-muted bx bxs-cloud-upload text-center"></i>
                                    </div>

                                    <h4>ادخل الصور هنا</h4>
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

    {{-- <script type="text/javascript">
        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThmb').attr('src', e.target.result).width(130).height(150);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script> --}}


<script>

    $(document).ready(function(){
     $('#multiImg').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data

            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                    .height(80); //create image element
                        $('#preview_image').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });

        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
     });
    });

    </script>

{{-- <script src="{{ asset('build/libs/dropzone/min/dropzone.min.js') }}"></script> --}}

{{-- <script src="{{ asset('build/js/app.js') }}"></script> --}}



@endsection
