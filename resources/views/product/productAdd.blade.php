@extends('layouts.master')
@section('title')
    اضافة منتج
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

















<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">إضافة منتج  </h4>
        </div>
        <hr>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
            <div class="col">
                <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
<div class="col-12">


<div class="row"> <!-- start 1st row  -->

			<div class="col-md-6">

                <div class="form-group">
                    <h5>القسم الرئيسي <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="cate_id" id="select" class="form-control"  >
                            <option value="" selected disabled >-- اختر القسم الرئيسي--</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name  }}</option>
                            @endforeach
                        </select>
                        @error('cate_id')
                        <span class="text-danger" >{{ $message }}</span>
                        @enderror
                     </div>
                    </div>

			</div> <!-- end col md 6 -->


			<div class="col-md-6">

				<div class="form-group">
                    <h5>القسم الفرعي <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="subcate_id" id="select" class="form-control"  >
                            <option value="" selected disabled >-- اختر القسم الفرعي--</option>
                        </select>
                        @error('subcate_id')
                        <span class="text-danger" >{{ $message }}</span>
                        @enderror
                     </div>
                    </div>

			</div> <!-- end col md 6 -->

		</div> <!-- end 1st row  -->

<div class="row"> <!-- start 2nd row  -->
    <div class="col-md-12">


        <div class="form-group">
            <h5 for="name">أسم المنتج  <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" id="name" name="name" class="form-control">
                @error('name')
                    <span class="text-danger" >{{ $message }}</span>
                @enderror
            </div>
        </div>

			</div> <!-- end col md 12 -->

		</div> <!-- end 2nd row  -->

<div class="row"> <!-- start 3rd row  -->
    <div class="col-md-12">

        <div class="form-group">
            <h5 for="short_desc">الوصف <span class="text-danger">*</span></h5>
            <div class="controls">
                <textarea name="short_desc" id="textarea" class="form-control" required placeholder="يمكن ان تكتب وصفاً للمنتج "></textarea>
                @error('short_desc')
                    <span class="text-danger" >{{ $message }}</span>
                @enderror
            </div>
        </div>

			</div> <!-- end col md 12 -->

		</div> <!-- end 3rd row  -->

<div class="row"> <!-- start 4th row  -->
    <div class="col-md-4">

        <div class="form-group">
            <h5 for="price">السعر <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="number"  name="price" />
                @error('price')
                    <span class="text-danger" >{{ $message }}</span>
                @enderror
            </div>
        </div>

			</div> <!-- end col md 4 -->

			<div class="col-md-4">

                <div class="form-group">
                    <h5 for="min_price">السعر بعد الخصم</h5>
                    <div class="controls">
                        <input type="number"  name="min_price" />
                        @error('min_price')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror
                    </div>
                </div>

			</div> <!-- end col md 4 -->


			<div class="col-md-4">

                <div class="form-group">
                    <h5 for="increase_ratio">الزياده %</h5>
                    <div class="controls">
                        <input type="number"  name="increase_ratio" />
                        @error('increase_ratio')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror
                    </div>
                </div>

			</div> <!-- end col md 4 -->

		</div> <!-- end 4th row  -->

<div class="row"> <!-- start 4th row  -->
    <div class="col-md-4">

        <div class="form-group">
            <h5 for="code">الكود</h5>
            <div class="controls">
                <input type="text"  name="code" />
                @error('code')
                    <span class="text-danger" >{{ $message }}</span>
                @enderror
            </div>
        </div>

    </div> <!-- end col md 4 -->
    <div class="col-md-4">

        <div class="form-group">
            <h5 for="count">عدد القطع</h5>
            <div class="controls">
                <input type="number"  name="count" />
                @error('count')
                    <span class="text-danger" >{{ $message }}</span>
                @enderror
            </div>
        </div>

    </div> <!-- end col md 4 -->



		</div> <!-- end 4th row  -->

<div class="row"> <!-- start 5th row  -->
    <div class="col-md-12">

        <div class="form-group">
            <h5 for="main_thambnail">Main Thambnail <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="file"  name="main_thambnail" class="form-control" required=""  onChange="mainThamUrl(this)" />
                @error('main_thambnail')
                    <span class="text-danger" >{{ $message }}</span>
                @enderror
                <img src="" id="mainThmb" alt="">
            </div>
        </div>

			</div> <!-- end col md 12 -->

		</div> <!-- end 5th row  -->

<hr>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<div class="controls">
					<fieldset>
						<input type="checkbox" id="checkbox_1" name="is_new" value="1">
						<label for="checkbox_1">جديد</label>
					</fieldset>
					<fieldset>
						<input type="checkbox" id="checkbox_2" name="on_sale"  value="1">
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

						<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Product">
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

    <script type="text/javascript">
        function mainThamUrl(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#mainThmb').attr('src',e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('select[name="cate_id"]').on('change', function(){
              var category_id = $(this).val();
              if(category_id) {
                  $.ajax({
                      url: "{{  url('/subcategory/ajax') }}/"+category_id,
                      type:"GET",
                      dataType:"json",
                      success:function(data) {
                         var d =$('select[name="subcate_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcate_id"]').append('<option value="'+ value.id +'">' + value.name + '</option>');
                            });
                      },
                  });
              } else {
                  alert('danger');
              }
          });
      });
      </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


@endsection
















