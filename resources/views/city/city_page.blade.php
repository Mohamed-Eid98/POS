@extends('layouts.master')

@section('title')
    تعديل محافظه
@endsection

@section('css')
    <!-- Plugins css -->
    <link href="{{ URL::asset('build/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection




@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            تعديل
        @endslot
        @slot('title')
            محافظه
        @endslot
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

                    <h4 class="card-title">تعديل محافظه </h4>
                    <p class="card-title-desc">
                    </p>

                    <div>

                        <form action="{{ route('city.update') }}" class="dropzone" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                        <input type="hidden" name="id" value="{{ $city->id }}">

                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">اسم المحافظه <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="formrow-firstname-input" name="name"
                                    value="{{ $city->general_title }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                    </div>
                    <div class="text-center mt-4">
                        <input type="submit" class="btn btn-primary waves-effect waves-light" value="تعديل">
                    </div>
                    </form>






                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
