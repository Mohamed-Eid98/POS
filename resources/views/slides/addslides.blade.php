@extends('layouts.master')

@section('title')
    إضافة بانر
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
            بانر
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

                    <h4 class="card-title">إضافة بانر</h4>
                    <p class="card-title-desc">
                    </p>

                    <div>

                        <form action="{{ route('slide.update') }}" class="dropzone" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-6">

                                <div class="form-group">
                                    <h5>نوع البانر <span class="text-danger">*</span></h5>
                                    <div class="controls">

                                        <select name="type" id="select" class="form-control" onchange="updateSecondSelect(this.value)">
                                            <option value="" selected disabled>-- اختر النوع
                                                --
                                            </option>
                                            <option value="Product" >منتج </option>
                                            <option value="Category" >قسم</option>
                                            <option value="MultiProduct" >منتاجات</option>
                                        </select>
                                        @error('type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label class="form-label">نوع المنتج </label>

                                    <select name="type_id[]" id="secondSelect" class="select2 form-control select2-multiple" multiple="multiple"
                                    data-placeholder="Choose ...">
                                    <option value="" selected disabled>-- اختر النوع
                                        --
                                    </option>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-3">

                                <div class="mb-3">
                                    <label class="form-label">الترتيب </label>

                                    <input type="number" name="sort" id="" class="form-control">

                                </div>
                            </div>



                            <div class="box">
                                <div class="box-header with-border">
                                    <h4 class="box-title">إضافة صوره </h4>
                                </div>
                                <hr>
                                <!-- start 2nd row  -->



                                <div class="fallback">
                                    <img src="" id="mainThmb" alt="">
                                    <br><br>
                                    <input type="file" name="pic" onChange="mainThamUrl(this)" required>
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
                    <div class="text-center mt-4">
                        <input type="submit" class="btn btn-primary waves-effect waves-light" value="حفظ">
                    </div>
                    </form>






                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <!-- JAVASCRIPT -->

@endsection

@section('script')

    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>



<script>

function updateSecondSelect(selectedValue) {
  var type = selectedValue;
  var secondSelect = document.getElementById("secondSelect");

  // Clear any existing options and remove the multiple attribute
  secondSelect.innerHTML = "";
  secondSelect.removeAttribute("multiple");

  // Fetch the options from the server using AJAX
  var url = '/api-' + (type == 'Category' ? 'categories' : 'products') + '?type=' + encodeURIComponent(type);
  fetch(url)
    .then(response => response.json())
    .then(options => {
      options.forEach(option => {
        var optionElement = document.createElement("option");
        optionElement.value = option.id;
        optionElement.text = option.name;
        secondSelect.appendChild(optionElement);
      });

      // If the selected value is "MultiProduct", add the multiple attribute
      if (type === "MultiProduct") {
        secondSelect.setAttribute("multiple", "multiple");
      }
    })
    .catch(error => console.error(error));
}

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


{{-- <script src="{{ asset('build/libs/dropzone/min/dropzone.min.js') }}"></script> --}}

{{-- <script src="{{ asset('build/js/app.js') }}"></script> --}}



@endsection
