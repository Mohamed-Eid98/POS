@extends('layouts.master')
@section('title')
    اضافة منتج
@stop
@section('css')
    <!--  Owl-carousel css-->
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

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

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
                                    <input type="text" id="name" name="name" class="form-control">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5 for="desc">وصف المنتج <span class="text-danger">*</span>
                                </h5>
                                <div class="controls">
                                    <textarea name="desc" class="form-control" id="desc" cols="10" rows="5"></textarea>
                                    @error('desc')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6">

                                    <h5 for="code">الكود</h5>
                                    <div class="controls">
                                        <input type="text" name="code" class="form-control" />
                                        @error('code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                        </div>
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
                                <h4 class="box-title"> معلومات</h4>
                            </div>
                            <hr>
                            <!-- start 2nd row  -->


                        </div>
                        <div class="row">
                            <!-- start 1st row  -->






                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label class="form-label">المقاس </label>

                                    <select name="size[]" class="select2 form-control select2-multiple"
                                        multiple="multiple" data-placeholder="Choose ...">

                                        @foreach ($sizes as $size)
                                            <option value="{{ $size->id }}">
                                                {{ $size->name }}
                                            </option>
                                        @endforeach

                                    </select>

                                </div>
                            </div> <!-- end col md 6 -->

                        </div> <!-- end 1st row  -->

                    </div>
                    <!-- end row -->
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
                                    <label for="checkbox_2">عرض</label>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="controls">
                                <fieldset>
                                    <input type="checkbox" id="checkbox_3" name="new_arrival" value="1">
                                    <label for="checkbox_3">لم يصل</label>
                                </fieldset>
                                <fieldset>
                                    <input type="checkbox" id="checkbox_4" name="best_seller" value="1">
                                    <label for="checkbox_4">الافضل مبيعاً</label>
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


        </div>
        </div>
    </form>





    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->

    </section>
    <!-- /.content -->
    </div>

@endsection




@section('js')



    {{-- $(document).ready(function() {
    $('select[name="cate_id"]').on('change', function(){})
    var category_id = $(this).val();
    $.get('/ajax-' + category_id ,
    success:function(data) {
        var d =$('select[name="subcate_id"]').empty();
        $.each(data, function(key, value){
            $('select[name="subcate_id"]').append('<option value="'+ value.id +'">' + value.name + '</option>');
        });
    },
});

});
</script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
