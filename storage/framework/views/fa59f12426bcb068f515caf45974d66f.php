<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                

                

                <li class="mm-active">
                    <a href="<?php echo e(route('root')); ?>" class="waves-effect active">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">الصفحه الرئيسيه</span>
                    </a>
                </li>

                <li class="menu-title" key="t-menu">الاقسام</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">الاقسام الرئيسيه</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo e(route('category.add')); ?>" key="t-default">إضافة قسم رئيسي</a></li>
                        <li><a href="<?php echo e(route('category.show')); ?>" key="t-saas">عرض الاقسام الرئيسيه</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="t-dashboards">الاقسام الفرعيه</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo e(route('subcategory.add')); ?>" key="t-default">إضافة قسم فرعي</a></li>
                        <li><a href="<?php echo e(route('subcategory.show')); ?>" key="t-saas">عرض الاقسام الفرعيه</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="t-dashboards"> المنتجات</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo e(route('product.add')); ?>" key="t-default">إضافة المنتج</a></li>

                        <li><a href="<?php echo e(route('product.addcolorandsize')); ?>" key="t-saas"> اضافه الوان ومقاسات
                                المنتج</a>
                        </li>

                        <li><a href="<?php echo e(route('product.show')); ?>" key="t-saas">عرض المنتجات</a></li>

                    </ul>
                </li>

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
                ?>

                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title" key="t-menu">الطلبيات</li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-task"></i>

                            <span key="t-dashboards">
                                الطلبيات</span>
                            <span class="badge rounded-pill bg-danger float-end"> <?php echo e($all_orders); ?></span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a class="slide-item" href="<?php echo e(route('orders.show')); ?>">
                                    <span class="badge rounded-pill bg-info float-end"> <?php echo e($all_orders); ?></span>
                                    كل الطلبات</a>
                            <li><a class="slide-item" href="<?php echo e(route('orders.pendingg')); ?>">
                                    <span class="badge rounded-pill bg-light float-end"> <?php echo e($pending_orders); ?></span>
                                    طلبات معلقه</a>
                            </li>
                            <li><a class="slide-item" href="<?php echo e(route('orders.delivered')); ?>">
                                    <span class="badge rounded-pill bg-secondary float-end">
                                        <?php echo e($deliered_orders); ?></span>
                                    تم توصيلها</a>
                            <li><a class="slide-item" href="<?php echo e(route('orders.inprograss')); ?>">
                                    <span class="badge rounded-pill bg-primary float-end">
                                        <?php echo e($inPrograss_orders); ?></span>
                                    جاري العمل عليها</a>
                            <li><a class="slide-item" href="<?php echo e(route('orders.paid.show')); ?>">
                                    <span class="badge rounded-pill bg-primary float-end"> <?php echo e($paid_orders); ?></span>
                                    مدفوعه</a>

                            <li><a class="slide-item" href="<?php echo e(route('orders.rejected')); ?>">
                                    <span class="badge rounded-pill bg-warning float-end">
                                        <?php echo e($rejected_orders); ?></span>
                                    فشلت </a>
                            <li><a class="slide-item" href="<?php echo e(route('orders.cancelled')); ?>">
                                    <span class="badge rounded-pill bg-danger float-end">
                                        <?php echo e($cancelled_orders); ?></span>
                                    تم الغاؤها </a>
                        </ul>
                    </li>
                    <li class="menu-title" key="t-menu">اضافه اشعارات</li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-store"></i>

                            <span key="t-dashboards"> اضافه اشعارات</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a class="slide-item" href="<?php echo e(route('notification.add')); ?>"> اضافه اشعارات </a>
                            <li><a class="slide-item" href="<?php echo e(route('notification.show')); ?>"> عرض الاشعارات </a>

                        </ul>
                    </li>

                    <li class="menu-title" key="t-menu">العملاء</li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-list-ul"></i>

                            <span key="t-dashboards"> العملاء</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a class="slide-item" href="<?php echo e(route('users.show')); ?>">جميع العملاء</a>

                        </ul>
                    </li>
                    <li class="menu-title" key="t-menu">المحافظات</li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-envelope"></i>

                            <span key="t-dashboards"> المحافظات</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a class="slide-item" href="<?php echo e(route('city.add')); ?>"> اضافه محافظه </a>
                            <li><a class="slide-item" href="<?php echo e(route('city.show')); ?>"> عرض المحافظات </a>
                            <li><a class="slide-item" href="<?php echo e(route('area.add')); ?>"> اضافه منطقه </a>
                            <li><a class="slide-item" href="<?php echo e(route('area.show')); ?>"> عرض المناطق </a>
                        </ul>
                    </li>
                    <li class="menu-title" key="t-menu">الفواتير</li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-envelope"></i>

                            <span key="t-dashboards"> الفواتير</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a class="slide-item" href="<?php echo e(route('invoices.page')); ?>"> اضافه فاتوره </a>
                            <li><a class="slide-item" href="<?php echo e(route('invoices.page')); ?>"> عرض الفواتير </a>

                        </ul>
                    </li>
                    <li class="menu-title" key="t-menu">الاعدادات</li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-file"></i>

                            <span key="t-dashboards"> الاعدادات</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <a class="dropdown-item" href="javascript:void();"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                    class="bx bx-power-off font-size-16 align-middle me-1"></i> <span>تسجيل
                                    خروج</span></a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                        </ul>
                    </li>



                    
                </ul>
                </li>
            </ul>
            </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<?php /**PATH C:\xampp\htdocs\POS\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>