

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Dashboards'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Dashboards
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Dashboard
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-xl-4">
            
        </div>

        <?php
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

        ?>
        <div class="col-xl-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">الطلبات</p>
                                    <h4 class="mb-0"><?php echo e($all_orders); ?></h4>
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
                                    <h4 class="mb-0"><?php echo e($payments_today); ?> دينار</h4>
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
                                    <h4 class="mb-0"><?php echo e(floor($payments_sum / $payments_count)); ?> دينار</h4>
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
                                            <div>
                                                <div class="my-3">

                                                <span class="card-title h2" style="color: #1f7ce0!important;">
                                                    <?php echo e($pending_orders); ?>

                                                </span>
                                            </div>

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
                                            <h6 class="card-subtitle" style="color: #000000!important;">تم التسليم </h6>
                                            <span class="card-title h2"
                                                style="font-size: 20px;color: #3f81d2;;"><?php echo e($deliered_orders); ?>

                                            </span>
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
                                            <h6 class="card-subtitle" style="color: #0c0a09!important;"> قيد التوصيل
                                            </h6>
                                            <span class="card-title h2" style="color: #3f81d2;">
                                                <?php echo e($inPrograss_orders); ?>

                                            </span>
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
                                                <h6 class="card-subtitle" style="color: #030302!important;">تم الدفع
                                                </h6>
                                                <span class="card-title h2" style="color: #3f81d2;">
                                                    <?php echo e($paid_orders); ?>

                                                </span>

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
                                                <h6 class="card-subtitle" style="color: #040303!important;">تم الرفض
                                                </h6>
                                                <span class="card-title h2" style="color: #3f81d2;"><?php echo e($rejected_orders); ?>

                                                </span>
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
                                                <h6 class="card-subtitle" style="color: #0a0908!important;"> تم
                                                    الإلغاء
                                                </h6>
                                                <span class="card-title h2" style="color: #3f81d2;">
                                                    <?php echo e($cancelled_orders); ?>

                                                </span>
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
                                                <img src="<?php echo e(URL::asset('/build/images/product/img-7.png')); ?>"
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
                                                <img src="<?php echo e(URL::asset('/build/images/product/img-4.png')); ?>"
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
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
        <!-- apexcharts -->
        <script src="<?php echo e(URL::asset('/build/libs/apexcharts/apexcharts.min.js')); ?>"></script>

        <!-- dashboard init -->
        <script src="<?php echo e(URL::asset('build/js/pages/dashboard.init.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\test\Downloads\New folder\POS\resources\views/index.blade.php ENDPATH**/ ?>