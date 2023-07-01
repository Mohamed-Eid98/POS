
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
                                    <h5> المحافظه <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="cate_id" id="select" class="form-control"  >
                                            <option value="" selected disabled >-- اختر المحافظه --</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->general_title  }}</option>
                                            @endforeach
                                        </select>
                                        @error('cate_id')
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










