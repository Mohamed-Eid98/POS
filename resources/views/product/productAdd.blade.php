@extends('layouts.master')
@section('title')
    اضافة منتج
@stop
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{ asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">


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
    <!-- App Css-->
    {{-- <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" /> --}}



@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">اضافة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    منتج جديد</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection


@section('content')


    @if (session('add'))
        <div class="alert alert-success">
            {{ session('add') }}
        </div>
    @endif


    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
        @csrf


        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">


                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">إضافة منتج </h4>
                            </div>
                            <hr>
                            <!-- start 2nd row  -->


                            <div class="form-group">
                                <h5 for="name">أسم المنتج <span class="text-danger">*</span>
                                </h5>
                                <div class="controls">
                                    <input type="text" id="name" name="name" class="form-control" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5 for="desc">وصف المنتج <span class="text-danger">*</span>
                                </h5>
                                <div class="controls">
                                    <textarea name="desc" class="form-control" id="desc" cols="10" rows="5" required></textarea>
                                    @error('desc')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 ">

                                    <h4 for="code" class=" my-3">الكود</h4>
                                    <div class="controls">
                                        <input type="text" name="code" class="form-control" />
                                        @error('code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>


                                <div class="col-md-6">
                                    <div class="mb-3">

                                        <h4 class="form-label my-3">الوسوم </h4>


                                        <select name="tag" id="select" class="form-control">
                                            <option value="" selected disabled>-- اختر --</option>
                                            <option value="">
                                                sss
                                            </option>

                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">إضافة مقاسات والوان المنتج</h4>
                            <div class="text-md-end">

                                <button type="button" onclick="addSizesAndColors()" class="btn btn-primary">اضافة جزء
                                    جديد
                                    للون
                                    والمقاس </button>
                            </div>

                            <p class="card-title-desc">
                            </p>

                            <div>



                                <div class="col-md-6">

                                    <div class="form-group">
                                        <h5>اللون <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="color[]" id="select" class="form-control">
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

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="mb-3">

                                            <h4 class="form-label my-3">المقاس </h4>


                                            <select name="size[]" id="select" class="form-control">
                                                <option value="" selected disabled>-- اختر المقاس --</option>
                                                @foreach ($sizes as $size)
                                                    <option value="{{ $size->id }}">
                                                        {{ $size->name }}
                                                    </option>
                                                @endforeach

                                            </select>

                                        </div>

                                        <div class="mb-3">
                                            <h4 class="form-label">الكميه </h4>
                                            <input type="number" name="qty[]" required class="form-control">

                                        </div>
                                    </div>

                                    <div class="col-md-4 my-5">
                                        <button type="button" onclick="add()" class="btn btn-primary">اضافة جزء
                                            للكميه
                                            والمقاس </button> <br>

                                    </div>

                                </div>
                            </div>

                            <div id="firstsizeandquantitycontainer" style="display:flex">


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
                                    <input type="file" name="multi_img[]" class="form-control" multiple=""
                                        id="multiImg">
                                    @error('multi_image')
                                        <span class="text-danger">{{ $message }}</span>
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


                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->



        <div id="sizesAndColorsContainer">

        </div>




        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">


                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title"> الاقسام</h4>
                            </div>
                            <hr>
                            <!-- start 2nd row  -->


                        </div>


                        <div class="row">
                            <!-- start 1st row  -->

                            <div class="col-md-6">

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

                            </div> <!-- end col md 6 -->


                            <div class="col-md-6">

                                <div class="form-group">
                                    <h5>القسم الفرعي <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subcate_id" id="select" class="form-control">
                                            <option value="" selected disabled>-- اختر القسم الفرعي--</option>
                                        </select>
                                        @error('subcate_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div> <!-- end col md 6 -->

                        </div> <!-- end 1st row  -->







                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">


                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title"> تفاصيل</h4>
                            </div>
                            <hr>
                            <!-- start 2nd row  -->


                        </div>


                        <div class="row">
                            <!-- start 1st row  -->

                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5 for="price">السعر <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="number" name="price" class="form-control" />
                                        @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div> <!-- end col md 6 -->

                            {{--
                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5 for="qty[]">الكميه </h5>
                                    <div class="controls">
                                        <input type="number" name="qty[]" class="form-control" />
                                        @error('qty[]')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div> <!-- end col md 6 --> --}}


                        </div> <!-- end 1st row  -->


                        <div class="row">
                            <!-- start 1st row  -->

                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5 for="min_price"> الحد الادني </h5>
                                    <div class="controls">
                                        <input type="number" name="min_price" class="form-control" />
                                        @error('min_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div> <!-- end col md 4 -->


                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5 for="repeated_times"> عدد التكرار</h5>
                                    <div class="controls">
                                        <input type="number" name="repeated_times" class="form-control" />
                                        @error('repeated_times')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div> <!-- end col md 4 -->
                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5 for="increase_ratio">الزياده %</h5>
                                    <div class="controls">
                                        <input type="number" name="increase_ratio" class="form-control" />
                                        @error('increase_ratio')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div> <!-- end col md 6 -->

                        </div> <!-- end 1st row  -->

                    </div>
                </div>
            </div>
        </div>






        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">


                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">إضافة صوره </h4>
                            </div>
                            <hr>
                            <!-- start 2nd row  -->



                            <div class="fallback">
                                <img src="" id="mainThmb" alt="">
                                <br><br>
                                <input type="file" name="pic" onChange="mainThamUrl(this)">
                                @error('pic')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="dz-message needsclick">
                                <div class="mb-3">
                                    <i class="display-4 text-muted bx bxs-cloud-upload text-center"></i>
                                </div>

                                <h4>ادخل الصوره هنا</h4>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="controls">
                                <fieldset>
                                    <input type="checkbox" id="checkbox_1" name="new" value="1">
                                    <label for="checkbox_1">جديد</label>
                                </fieldset>
                                <fieldset>
                                    <input type="checkbox" id="checkbox_2" name="sale" value="1">
                                    <label for="checkbox_2">العروض</label>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="controls">
                                <fieldset>
                                    <input type="checkbox" id="checkbox_3" name="new_arrival" value="1">
                                    <label for="checkbox_3">وصل حديثا</label>
                                </fieldset>
                                <fieldset>
                                    <input type="checkbox" id="checkbox_4" name="best_seller" value="1">
                                    <label for="checkbox_4">الاكثر مبيعاً</label>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="اضافة منتج">
        </div>


    </form>


@endsection


@section('script')

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="cate_id"]').change(function() {
                var category_id = $(this).val();
                $.get('/ajax-' + category_id, function(data) {


                    var d = $('select[name="subcate_id"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="subcate_id"]').append('<option value="' + value.id +
                            '">' + value.name + '</option>');
                    });

                });
            });
        });
    </script>

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


    <script>
        function add() {
            var container = document.getElementById("firstsizeandquantitycontainer");

            // Create a new div element for each size and color fields
            var newDiv = document.createElement("div");
            newDiv.className = "sizesAndQuantityFields";


            // Add the HTML code for the size and color fields
            newDiv.innerHTML = `


    <div class="col-md-12 "style="padding-left:30px ">
          <div>
            <h4 class="form-label my-3">المقاس </h4>


            <select name="size[]" id="select" class="form-control">
                <option value="" selected disabled>-- اختر المقاس --</option>

                @foreach ($sizes as $size)
                    <option value="{{ $size->id }}">
                        {{ $size->name }}
                    </option>
                @endforeach

            </select>

        </div>

        <div class="mb-3">
            <h4 class="form-label">الكميه </h4>
            <input type="number" name="qty[]" required  class="form-control" >

        </div>


    <div>
     <button type="button" onclick="deleteSize(this)" class="btn btn-danger">حذف</button>
        </div> <br>


</div>
        `;

            // Append the new div to the container
            container.appendChild(newDiv);

        }

        function addSizesAndColors() {
            var container = document.getElementById("sizesAndColorsContainer");

            // Create a new div element for each size and color fields
            var newDiv = document.createElement("div");
            newDiv.className = "sizesAndColorsFields";

            // Add the HTML code for the size and color fields
            newDiv.innerHTML = `
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">إضافة مقاسات والوان المنتج</h4>
                            <p class="card-title-desc">
                            </p>

                            <div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>اللون <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="color[]" id="select" class="form-control">
                                                <option value="" selected disabled>-- اختر اللون --</option>
                                                @foreach ($colors as $color)
                                                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('color')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="mb-3">

                                                <h4 class="form-label my-3">المقاس </h4>


                                                <select name="size[]" id="select" class="form-control">
                                                    <option value="" selected disabled>-- اختر المقاس --</option>
                                                        @foreach ($sizes as $size)
                                                            <option value="{{ $size->id }}">
                                                                {{ $size->name }}
                                                            </option>
                                                        @endforeach

                                                </select>

                                            </div>

                                            <div class="mb-3">
                                                <h4 class="form-label">الكميه </h4>
                                                <input type="number" name="qty[]" required  class="form-control" >

                                            </div>
                                        </div>

                                        <div class="col-md-4 my-5">
  <button type="button" onclick="addqtyandsize(this)" class="btn btn-primary">اضافة جزء للكميه والمقاس  </button> <br>

                                    </div>


                                    <div class="col-md-12" >
  <div class="sizeandquantitycontainer" style="display:flex"></div>
</div>

                                </div>
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">إضافة صور</h4>
                                    </div>
                                    <hr>
                                    <!-- start 2nd row  -->
                                    <div class="fallback">
                                        <div class="row" id="preview_image"></div>
                                        <br>
                                        <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg">
                                        @error('multi_image')
                                            <span class="text-danger">{{ $message }}</span>
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

                            <div>
                                <button type="button" onclick="deleteSection(this)" class="btn btn-danger">حذف</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        `;

            // Append the new div to the container
            container.appendChild(newDiv);
        }

        function addqtyandsize(button) {
            var parent = button.closest(".row");
            var container = parent.querySelector(".sizeandquantitycontainer");

            // Create a new div element for each size and color fields
            var newDiv = document.createElement("div");
            newDiv.className = "sizesAndQuantityFields";

            // Add the HTML code for the size and color fields
            newDiv.innerHTML = `


    <div class="col-md-12 lol"style="padding-left:30px ">
          <div>
            <h4 class="form-label my-3">المقاس </h4>


            <select name="size[]" id="select" class="form-control">

                <option value="" selected disabled>-- اختر المقاس --</option>

                @foreach ($sizes as $size)
                    <option value="{{ $size->id }}">
                        {{ $size->name }}
                    </option>
                @endforeach

            </select>

        </div>

        <div class="mb-3">
            <h4 class="form-label">الكميه </h4>
            <input type="number" name="qty[]" required  class="form-control" >

        </div>


    <div>
     <button type="button" onclick="deleteSize(this)" class="btn btn-danger">حذف</button>
        </div> <br>


</div>
        `;

            // Append the new div to the container
            container.appendChild(newDiv);
        }


        function deleteSection(button) {
            var section = button.closest(".sizesAndColorsFields");
            section.remove();
        }

        function deleteSize(button) {
            var section = button.closest(".sizesAndQuantityFields");
            section.remove();
        }
    </script>


    <script>
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(80)
                                        .height(80); //create image element
                                    $('#preview_image').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>


@endsection
{{--
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


@endsection
 --}}
