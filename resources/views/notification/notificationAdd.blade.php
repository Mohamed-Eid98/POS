@extends('layouts.master')

@section('title')
    إضافةاشعار
@endsection

@section('css')
    <!-- Plugins css -->
    <link href="{{ URL::asset('build/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            إضافة
        @endslot
        @slot('title')
            اشعار
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

                    <h4 class="card-title"> الاشعار</h4>
                    <p class="card-title-desc">
                    </p>



                    <form action="{{ route('notification.store') }}" class="dropzone" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body">


                                        <div class="box">
                                            <div class="box-header with-border">
                                                <h4 class="box-title">إضافة اشعار</h4>
                                            </div>
                                            <hr>
                                            <!-- start 2nd row  -->

                                            <div class="mb-3">
                                                <div class="form-group">
                                                    <h2> نوع الاشعار<span class="text-danger">*</span></h2>
                                                    <div class="controls">
                                                        <select name="type" id="select" class="form-control">


                                                            <option value="تهنئه">تهنئه</option>
                                                            <option value="تنبيه">تنبيه</option>
                                                            <option value="معلومه">معلومه</option>


                                                        </select>
                                                        @error('type')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group my-5">
                                                <h2 for="name"> الاشعار<span class="text-danger">*</span>
                                                </h2>
                                                <div class="controls">
                                                    <textarea  id="name" name="name" class="form-control" cols="10" rows="5"></textarea>
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>





                                        </div>
                                    </div>
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
@endsection
