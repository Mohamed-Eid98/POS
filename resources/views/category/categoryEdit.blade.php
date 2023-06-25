@extends('layouts.master')
@section('title')
    تعديل قسم رئيسي
@stop
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
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

<section class="content">
    <div class="row">


      <div class="col-12">

        <div class="box">
          <div class="box-body">
              <div class="table-responsive">

            <form method="post" action="{{ route('category.update') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $category->id }}" class="form-control">
                <div class="form-group">
                    <h5 for="name">أسم القسم  <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" id="name" name="name" value="{{ $category->name }}" class="form-control">
                        @error('name')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="text-center">
                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="تعديل">
                </div>

            </form>

              </div>
          </div>
          <!-- /.box-body -->
        </div>
      </div>


    </div>
    <!-- /.row -->
</section>

@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Moment js -->
    <script src="{{ URL::asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <!--Internal  Flot js-->
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ URL::asset('assets/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ URL::asset('assets/js/chart.flot.sampledata.js') }}"></script>
    <!--Internal Apexchart js-->
    <script src="{{ URL::asset('assets/js/apexcharts.js') }}"></script>
    <!-- Internal Map -->
    <script src="{{ URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal-popup.js') }}"></script>
    <!--Internal  index js -->
    <script src="{{ URL::asset('assets/js/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.vmap.sampledata.js') }}"></script>
@endsection
