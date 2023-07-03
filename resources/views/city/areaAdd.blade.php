
@extends('layouts.master')

@section('title') إضافة منطقه  @endsection

@section('css')
    <!-- Plugins css -->
    <link href="{{ URL::asset('build/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection




@section('content')

    @component('components.breadcrumb')
        @slot('li_1') إضافة @endslot
        @slot('title')  منطقه @endslot
    @endcomponent










    @if (session('Add'))
<div class="alert alert-success">
    {{ session('Add') }}
</div>
@endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">إضافة منطقه جديده</h4>
                    <p class="card-title-desc">
                    </p>

                    <div>

                        <form action="{{ route('area.store') }}" class="dropzone" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div class="mb-3">
                                <div class="form-group">
                                    <h5> البلد <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="country_id" id="country_id" class="form-control"  >
                                            <option value="" selected disabled >-- اختر البلد --</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->general_title  }}</option>
                                            @endforeach
                                        </select>
                                        @error('country_id')
                                        <span class="text-danger" >{{ $message }}</span>
                                        @enderror
                                     </div>
                                    </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <h5> المحافظه <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="city_id" id="city_id" class="form-control"  >
                                            <option value="" selected disabled >-- اختر المحافظه --</option>

                                        </select>
                                        @error('city_id')
                                        <span class="text-danger" >{{ $message }}</span>
                                        @enderror
                                     </div>
                                    </div>
                            </div>

                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">اسم المنطقه <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="formrow-firstname-input" name="name" placeholder="ادخل اسم المنطقه من فضلك">
                                        @error('name')
                                            <span class="text-danger" >{{ $message }}</span>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">سعر التوصيل  <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="price" name="price" placeholder="ادخل السعر من فضلك">
                                        @error('price')
                                            <span class="text-danger" >{{ $message }}</span>
                                        @enderror
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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="country_id"]').change(function() {
            var country_id = $(this).val();
            $.get('/city-ajax-' + country_id, function(data) {


                var d = $('select[name="city_id"]').empty();
                $.each(data, function(key, value) {
                    $('select[name="city_id"]').append('<option value="' + value.id +
                        '">' + value.general_title + '</option>');
                });

            });
        });
    });
</script>

@section('js')


@section('script')


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






