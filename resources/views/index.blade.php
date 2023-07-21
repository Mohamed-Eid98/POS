@extends('layouts.master')

@section('title')
    @lang('translation.Dashboards')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
         as   لوحه تحكم
        @endslot
        @slot('title')
            بنسايز
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-4">
            {{-- <div class="card overflow-hidden">
                <div class="bg-primary bg-soft">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-3">
                                <h5 class="text-primary">مرحبا بك !</h5>
                                <p> لوحه تحكم Benesize</p>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="{{ URL::asset('/build/images/profile-img.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="avatar-md profile-user-wid mb-4">
                                <img src="{{ isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('/build/images/users/avatar-1.jpg') }}"
                                    alt="" class="img-thumbnail rounded-circle">
                            </div>
                            <h5 class="font-size-15 text-truncate">{{ Str::ucfirst(Auth::user()->name) }}</h5>
                            <p class="text-muted mb-0 text-truncate">الموظف المسؤل</p>
                        </div>

                        <div class="col-sm-8">
                            <div class="pt-4">
                                @php
                                    $all_orders = DB::table('orders')->count();
                                    $pending_orders = DB::table('orders')
                                        ->where('status', '=', 'Pending')
                                        ->count();
                                    $deliered_orders = DB::table('orders')
                                        ->where('status', '=', 'Delivered')
                                        ->count();
                                    $rejected_orders = DB::table('orders')
                                        ->where('status', '=', 'Rejected')
                                        ->count();
                                    $cancelled_orders = DB::table('orders')
                                        ->where('status', '=', 'Cancelled')
                                        ->count();
                                    $inPrograss_orders = DB::table('orders')
                                        ->where('status', '=', 'InProgress')
                                        ->count();
                                    $paid_orders = DB::table('orders')
                                        ->where('status', '=', 'Paid')
                                        ->count();
                                    $payments_today = DB::table('payments')
                                        ->whereDate('created_at', today())
                                        ->sum('price');
                                    $month = date('m'); // Get the current month
                                    $year = date('Y'); // Get the current year
                                    $payments_month = DB::table('payments')
                                        ->whereMonth('created_at', $month)
                                        ->whereYear('created_at', $year)
                                        ->sum('price');
                                    $payments_sum = DB::table('payments')->sum('price');
                                    $payments_count = DB::table('payments')->count();

                                @endphp

                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="font-size-15">{{ $pending_orders }}</h5>
                                        <p class="text-muted mb-0">عدد الطلبات المعلقه</p>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="font-size-15">{{ $payments_today }} دينار</h5>
                                        <p class="text-muted mb-0">ايراد اليوم</p>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <a href="" class="btn btn-primary waves-effect waves-light btn-sm">View Profile
                                        <i class="mdi mdi-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

        @php
            $all_orders = DB::table('orders')->count();
            $pending_orders = DB::table('orders')
                ->where('status', '=', 'Pending')
                ->count();
            $deliered_orders = DB::table('orders')
                ->where('status', '=', 'Delivered')
                ->count();
            $rejected_orders = DB::table('orders')
                ->where('status', '=', 'Rejected')
                ->count();
            $cancelled_orders = DB::table('orders')
                ->where('status', '=', 'Cancelled')
                ->count();
            $inPrograss_orders = DB::table('orders')
                ->where('status', '=', 'InProgress')
                ->count();
            $paid_orders = DB::table('orders')
                ->where('status', '=', 'Paid')
                ->count();
            $payments_today = DB::table('payments')
                ->whereDate('created_at', today())
                ->sum('price');
            $month = date('m'); // Get the current month
            $year = date('Y'); // Get the current year
            $payments_month = DB::table('payments')
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->sum('price');
            $payments_sum = DB::table('payments')->sum('price');
            $payments_count = DB::table('payments')->count();

        @endphp
        <div class="col-xl-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">الطلبات</p>
                                    <h4 class="mb-0">{{ $all_orders }}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-copy-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">ايرد اليوم</p>
                                    <h4 class="mb-0">{{ $payments_today }} دينار</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center ">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-archive-in font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">متوسط الايراد</p>
                                    <h4 class="mb-0">{{ floor($payments_sum / $payments_count) }} دينار</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->


        </div>
    </div>
    <!-- end row -->




    <div class="row">
        <div class="col-xl-12">
            <div class="card">

                <div class="card-body">
                    <div class="row flex-between gx-2 gx-lg-3 mb-2">
                        <div>
                            <h4><i class="fas fa-chart-bar"></i> إحصائيات لوحة التحكم </h4>
                        </div>
                        {{-- <div class="col-12 col-md-4" style="width: 20vw">
                <select class="custom-select" name="statistics_type" onchange="order_stats_update(this.value)">
                    <option value="overall">
                        إحصاءات عامة
                    </option>
                    <option value="today">
                        إحصاءات اليوم
                    </option>
                    <option value="this_month">
                        إحصائيات هذا الشهر
                    </option>
                </select>
            </div> --}}
                    </div>
                    <div class="row gx-2 gx-lg-4" id="order_stats">
                        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
                            <!-- Card -->
                            <a class="card card-hover-shadow h-100"
                                href="https://v1.supplyar.thiqa-serv.com/admin/orders/list/pending"
                                style="background: #FFFFFF">
                                <div class="card-body">
                                    <div class="flex-between align-items-center mb-1">
                                        <div style="text-align: right;">
                                            <div class="my-3">
                                                <h6 class="card-subtitle" style="color: #000000!important;">
                                                    طلبات معلقة</h6>
                                            </div>
                                            <div class="my-3">

                                                <span class="card-title h2" style="font-size: 20px;color: #3f81d2;">
                                                    {{ $pending_orders }}
                                                </span>

                                            </div>



                                        </div>
                                        <div style="text-align: left;">
                                            <i class="fas fa-shopping-cart ml-10" style="color: #3f81d2;"></i>

                                        </div>

                                    </div>
                                    <!-- End Row -->
                                </div>
                            </a>
                            <!-- End Card -->
                        </div>

                        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
                            <!-- Card -->
                            <a class="card card-hover-shadow h-100"
                                href="https://v1.supplyar.thiqa-serv.com/admin/orders/list/confirmed"
                                style="background: #FFFFFF;">
                                <div class="card-body">
                                    <div class="flex-between align-items-center mb-1">
                                        <div style="text-align: right;">
                                            <div class="my-3">

                                                <h6 class="card-subtitle" style="color: #000000!important;">تم التسليم </h6>
                                            </div>
                                            <div class="my-3">

                                                <span class="card-title h2" style="font-size: 20px;color: #3f81d2;">
                                                    {{ $deliered_orders }}
                                                </span>
                                            </div>

                                        </div>

                                        <div style="text-align: left;">
                                            <i class="fas fa-shipping-fast" style="font-size: 20px;color: #3f81d2;"></i>
                                        </div>
                                    </div>
                                    <!-- End Row -->
                                </div>
                            </a>
                            <!-- End Card -->
                        </div>

                        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
                            <!-- Card -->
                            <a class="card card-hover-shadow h-100"
                                href="https://v1.supplyar.thiqa-serv.com/admin/orders/list/processing"
                                style="background: #FFFFFF">
                                <div class="card-body">
                                    <div class="flex-between align-items-center gx-2 mb-1">
                                        <div style="text-align: right;">
                                            <div class="my-3">

                                                <h6 class="card-subtitle" style="color: #0c0a09!important;"> قيد التوصيل
                                                </h6>
                                            </div>
                                            <div class="my-3">

                                                <span class="card-title h2" style="font-size: 20px;color: #3f81d2;">
                                                    {{ $inPrograss_orders }}
                                                </span>
                                            </div>

                                        </div>

                                        <div style="text-align: left;">
                                            <i class="far fa-clock" style="font-size: 20px;color: #3f81d2;"></i>
                                        </div>
                                    </div>
                                    <!-- End Row -->
                                </div>
                            </a>
                            <!-- End Card -->
                        </div>


                        <div class="row gx-2 gx-lg-4" id="order_stats">
                            <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
                                <!-- Card -->
                                <a class="card card-hover-shadow h-100"
                                    href="https://v1.supplyar.thiqa-serv.com/admin/orders/list/pending"
                                    style="background: #FFFFFF">
                                    <div class="card-body">
                                        <div class="flex-between align-items-center mb-1">
                                            <div style="text-align: right;">
                                                <div class="my-3">

                                                    <h6 class="card-subtitle" style="color: #030302!important;">تم الدفع
                                                    </h6>
                                                </div>
                                                <div class="my-3">

                                                    <span class="card-title h2" style="font-size: 20px;color: #3f81d2;">
                                                        {{ $paid_orders }}
                                                    </span>
                                                </div>

                                            </div>
                                            <div style="text-align: left;">
                                                <i class="fas fa-shopping-cart ml-10"
                                                    style="font-size: 20px;color: #3f81d2;"></i>

                                            </div>

                                        </div>
                                        <!-- End Row -->
                                    </div>
                                </a>
                                <!-- End Card -->
                            </div>

                            <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
                                <!-- Card -->
                                <a class="card card-hover-shadow h-100"
                                    href="https://v1.supplyar.thiqa-serv.com/admin/orders/list/confirmed"
                                    style="background: #FFFFFF;">
                                    <div class="card-body">
                                        <div class="flex-between align-items-center mb-1">
                                            <div style="text-align: right;">
                                                <div class="my-3">

                                                    <h6 class="card-subtitle" style="color: #040303!important;">تم الرفض
                                                    </h6>
                                                </div>
                                                <div class="my-3">

                                                    <span class="card-title h2"
                                                        style="font-size: 20px;color: #3f81d2;">{{ $rejected_orders }}
                                                    </span>
                                                </div>

                                            </div>

                                            <div style="text-align: left;">
                                                <i class="fas fa-window-close"
                                                    style="font-size: 20px;color: #3f81d2;"></i>
                                            </div>
                                        </div>
                                        <!-- End Row -->
                                    </div>
                                </a>
                                <!-- End Card -->
                            </div>

                            <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
                                <!-- Card -->
                                <a class="card card-hover-shadow h-100"
                                    href="https://v1.supplyar.thiqa-serv.com/admin/orders/list/processing"
                                    style="background: #FFFFFF">
                                    <div class="card-body">
                                        <div class="flex-between align-items-center gx-2 mb-1">
                                            <div style="text-align: right;">
                                                <div class="my-3">

                                                    <h6 class="card-subtitle" style="color: #0a0908!important;"> تم
                                                        الإلغاء
                                                    </h6>
                                                </div>

                                                <div class="my-3">

                                                    <span class="card-title h2" style="font-size: 20px;color: #3f81d2;">
                                                        {{ $cancelled_orders }}
                                                    </span>
                                                </div>

                                            </div>

                                            <div style="text-align: left;">
                                                <i class="fas fa-prescription-bottle-alt"
                                                    style="font-size: 20px;color: #3f81d2;"></i>
                                            </div>
                                        </div>
                                        <!-- End Row -->
                                    </div>
                                </a>
                                <!-- End Card -->
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">اخر تحويل</h4>
                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 20px;">
                                        <div class="form-check font-size-16 align-middle">
                                            <input class="form-check-input" type="checkbox" id="transactionCheck01">
                                            <label class="form-check-label" for="transactionCheck01"></label>
                                        </div>
                                    </th>
                                    <th class="align-middle">Order ID</th>
                                    <th class="align-middle">Billing Name</th>
                                    <th class="align-middle">Date</th>
                                    <th class="align-middle">Total</th>
                                    <th class="align-middle">Payment Status</th>
                                    <th class="align-middle">Payment Method</th>
                                    <th class="align-middle">View Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" type="checkbox" id="transactionCheck02">
                                            <label class="form-check-label" for="transactionCheck02"></label>
                                        </div>
                                    </td>
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2540</a> </td>
                                    <td>Neal Matthews</td>
                                    <td>
                                        07 Oct, 2019
                                    </td>
                                    <td>
                                        $400
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-soft-success font-size-11">Paid</span>
                                    </td>
                                    <td>
                                        <i class="fab fa-cc-mastercard me-1"></i> Mastercard
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button"
                                            class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                            View Details
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" type="checkbox" id="transactionCheck03">
                                            <label class="form-check-label" for="transactionCheck03"></label>
                                        </div>
                                    </td>
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2541</a> </td>
                                    <td>Jamal Burnett</td>
                                    <td>
                                        07 Oct, 2019
                                    </td>
                                    <td>
                                        $380
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-soft-danger font-size-11">Chargeback</span>
                                    </td>
                                    <td>
                                        <i class="fab fa-cc-visa me-1"></i> Visa
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button"
                                            class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                            View Details
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" type="checkbox" id="transactionCheck04">
                                            <label class="form-check-label" for="transactionCheck04"></label>
                                        </div>
                                    </td>
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2542</a> </td>
                                    <td>Juan Mitchell</td>
                                    <td>
                                        06 Oct, 2019
                                    </td>
                                    <td>
                                        $384
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-soft-success font-size-11">Paid</span>
                                    </td>
                                    <td>
                                        <i class="fab fa-cc-paypal me-1"></i> Paypal
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button"
                                            class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                            View Details
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" type="checkbox" id="transactionCheck05">
                                            <label class="form-check-label" for="transactionCheck05"></label>
                                        </div>
                                    </td>
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2543</a> </td>
                                    <td>Barry Dick</td>
                                    <td>
                                        05 Oct, 2019
                                    </td>
                                    <td>
                                        $412
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-soft-success font-size-11">Paid</span>
                                    </td>
                                    <td>
                                        <i class="fab fa-cc-mastercard me-1"></i> Mastercard
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button"
                                            class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                            View Details
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" type="checkbox" id="transactionCheck06">
                                            <label class="form-check-label" for="transactionCheck06"></label>
                                        </div>
                                    </td>
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2544</a> </td>
                                    <td>Ronald Taylor</td>
                                    <td>
                                        04 Oct, 2019
                                    </td>
                                    <td>
                                        $404
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-soft-warning font-size-11">Refund</span>
                                    </td>
                                    <td>
                                        <i class="fab fa-cc-visa me-1"></i> Visa
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button"
                                            class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                            View Details
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" type="checkbox" id="transactionCheck07">
                                            <label class="form-check-label" for="transactionCheck07"></label>
                                        </div>
                                    </td>
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2545</a> </td>
                                    <td>Jacob Hunter</td>
                                    <td>
                                        04 Oct, 2019
                                    </td>
                                    <td>
                                        $392
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-soft-success font-size-11">Paid</span>
                                    </td>
                                    <td>
                                        <i class="fab fa-cc-paypal me-1"></i> Paypal
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button"
                                            class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                            View Details
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                </div>
            </div>
        </div>
    </div> --}}
        <!-- end row -->

        <!-- Transaction Modal -->
        <div class="modal fade transaction-detailModal" tabindex="-1" role="dialog"
            aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="transaction-detailModalLabel">Order Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-2">Product id: <span class="text-primary">#SK2540</span></p>
                        <p class="mb-4">Billing Name: <span class="text-primary">Neal Matthews</span></p>

                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <div>
                                                <img src="{{ URL::asset('/build/images/product/img-7.png') }}"
                                                    alt="" class="avatar-sm">
                                            </div>
                                        </th>
                                        <td>
                                            <div>
                                                <h5 class="text-truncate font-size-14">Wireless Headphone (Black)</h5>
                                                <p class="text-muted mb-0">$ 225 x 1</p>
                                            </div>
                                        </td>
                                        <td>$ 255</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <div>
                                                <img src="{{ URL::asset('/build/images/product/img-4.png') }}"
                                                    alt="" class="avatar-sm">
                                            </div>
                                        </th>
                                        <td>
                                            <div>
                                                <h5 class="text-truncate font-size-14">Phone patterned cases</h5>
                                                <p class="text-muted mb-0">$ 145 x 1</p>
                                            </div>
                                        </td>
                                        <td>$ 145</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h6 class="m-0 text-right">Sub Total:</h6>
                                        </td>
                                        <td>
                                            $ 400
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h6 class="m-0 text-right">Shipping:</h6>
                                        </td>
                                        <td>
                                            Free
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h6 class="m-0 text-right">Total:</h6>
                                        </td>
                                        <td>
                                            $ 400
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal -->
    @endsection

