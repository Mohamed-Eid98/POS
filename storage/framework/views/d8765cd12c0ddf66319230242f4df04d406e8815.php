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

                <?php if(auth()->guard()->check()): ?>

                    <?php $__currentLoopData = auth()->user()->role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($permission->name == 'categories' || $permission->name == 'admins'): ?>
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
                                    <li><a href="<?php echo e(route('subcategory.show')); ?>" key="t-saas">عرض الاقسام الفرعيه</a>
                                    </li>
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
                        <?php endif; ?>


                        <ul class="metismenu list-unstyled" id="side-menu">
                            <?php if($permission->name == 'orders' || $permission->name == 'admins'): ?>
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
                                                
                                                <span class="badge rounded-pill bg-info float-end">
                                                    <?php echo e($all_orders); ?></span>
                                                كل الطلبات</a>
                                        <li><a class="slide-item" href="<?php echo e(route('orders.pendingg')); ?>">
                                                
                                                <span class="badge rounded-pill bg-secondary float-end">
                                                    <?php echo e($pending_orders); ?></span>
                                                طلبات معلقه</a>
                                        </li>
                                        <li><a class="slide-item" href="<?php echo e(route('orders.delivered')); ?>">
                                                
                                                <span class="badge rounded-pill bg-success float-end">
                                                    <?php echo e($deliered_orders); ?></span>
                                                تم التسليم</a>
                                        <li><a class="slide-item" href="<?php echo e(route('orders.inprograss')); ?>">

                                                
                                                <span class="badge rounded-pill bg-info float-end">
                                                    <?php echo e($inPrograss_orders); ?></span>
                                                قيد التوصيل</a>
                                        <li><a class="slide-item" href="<?php echo e(route('orders.paid.show')); ?>">
                                                
                                                <span class="badge rounded-pill bg-primary float-end">
                                                    <?php echo e($paid_orders); ?></span>
                                                تم الدفع</a>

                                        <li><a class="slide-item" href="<?php echo e(route('orders.rejected')); ?>">
                                                
                                                <span class="badge rounded-pill bg-danger float-end">
                                                    <?php echo e($rejected_orders); ?></span>
                                                تم الرفض </a>
                                        <li><a class="slide-item" href="<?php echo e(route('orders.cancelled')); ?>">
                                                
                                                <span class="badge rounded-pill bg-success float-end">
                                                    <?php echo e($cancelled_orders); ?></span>
                                                تم الإلغاء </a>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            






                            <?php if($permission->name == 'customers' || $permission->name == 'admins'): ?>
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow waves-effect my-3">
                                        <i class="bx bx-list-ul"></i>

                                        <span key="t-dashboards"> العملاء</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a class="slide-item" href="<?php echo e(route('users.show')); ?>">جميع العملاء</a>

                                    </ul>
                                </li>
                            <?php endif; ?>

                            <?php if($permission->name == 'cities' || $permission->name == 'admins'): ?>
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow waves-effect my-3">
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
                            <?php endif; ?>

                            <?php if($permission->name == 'privacies' || $permission->name == 'admins'): ?>
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow waves-effect my-3">
                                        <i class="bx bx-task"></i>

                                        <span key="t-dashboards"> السياسات</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a class="slide-item" href="<?php echo e(route('privacy.bene.show')); ?>">سياسة
                                                بنسايز</a>
                                        <li><a class="slide-item" href="<?php echo e(route('privacy.delivery.show')); ?>"> سياسة
                                                التوصيل </a>
                                        <li><a class="slide-item" href="<?php echo e(route('privacy.return.show')); ?>"> سياسة
                                                الارجاع </a>
                                        <li><a class="slide-item" href="<?php echo e(route('privacy.warranty.show')); ?>"> سياسه
                                                الضمان</a>
                                        <li><a class="slide-item" href="<?php echo e(route('privacy.terms.show')); ?>"> سياسات
                                                قانونيه</a>

                                    </ul>
                                </li>
                            <?php endif; ?>
                            <?php if($permission->name == 'notifications' || $permission->name == 'admins'): ?>
                                <li>

                                    <a href="javascript: void(0);" class="has-arrow waves-effect my-3">
                                        <i class="bx bx-store"></i>

                                        <span key="t-dashboards menu-title"> اضافه اشعارات</span>

                                        </h4>
                                    </a>

                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a class="slide-item" href="<?php echo e(route('notification.add')); ?>"> اضافه اشعارات
                                            </a>
                                        <li><a class="slide-item" href="<?php echo e(route('notification.show')); ?>"> عرض الاشعارات
                                            </a>

                                    </ul>
                                </li>
                            <?php endif; ?>

                            <?php if($permission->name == 'socials' || $permission->name == 'admins'): ?>
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow waves-effect my-3">
                                        <i class="bx bx-map"></i>
                                        <span key="t-dashboards"> مواقع التواصل الاجتماعي</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a class="slide-item" href="<?php echo e(route('social.add')); ?>"> مواقع التواصل </a>


                                    </ul>
                                </li>
                            <?php endif; ?>

                            <?php if($permission->name == 'sliders' || $permission->name == 'admins'): ?>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect my-3">
                                    <i class="bx bx-aperture"></i>
                                    <span key="t-dashboards"> البانر</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a class="slide-item" href="<?php echo e(route('slide.add')); ?>"> اضافه بانر</a>
                                    <li><a class="slide-item" href="<?php echo e(route('slides.show')); ?>"> عرض بانرات</a>




                                </ul>
                            </li>
                    <?php endif; ?>

                    <?php if($permission->name == 'coupons' || $permission->name == 'admins'): ?>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect my-3">
                                    <i class="bx bx-bitcoin"></i>
                                    <span key="t-dashboards"> الكوبونات</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a class="slide-item" href="<?php echo e(route('coupon.add')); ?>"> اضافه كوبون</a>
                                    <li><a class="slide-item" href="<?php echo e(route('coupon.show')); ?>"> عرض الكوبونات</a>


                                </ul>
                            </li>

                    <?php endif; ?>
                            <?php if($permission->name == 'complains' || $permission->name == 'admins'): ?>
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow waves-effect my-3">
                                        <i class="bx bx-receipt"></i>

                                        <span key="t-dashboards"> الشكاوي والمقترحات</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a class="slide-item" href="<?php echo e(route('complain.show')); ?>"> عرض الشكاوي</a>


                                    </ul>
                                </li>
                            <?php endif; ?>

                            <?php if($permission->name == 'employers' || $permission->name == 'admins'): ?>
                                <li class="menu-title" key="t-menu">قسم الموظفيين</li>
                                <li>
                                <li>

                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                        <i class="bx bx-home-circle"></i>
                                        <span key="bx bxs-user-detail"> اضافه دور</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="<?php echo e(route('employee.add.role')); ?>" key="t-saas"> اضافه
                                                دورالموظف</a>
                                        </li>

                                    </ul>
                                </li>
                                </li>
                                <li>

                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                        <i class="bx bx-file"></i>
                                        <span key="bx bx-briefcase-alt-2"> الموظفين</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="<?php echo e(route('employee.add')); ?>" key="t-saas"> اضافه موظف جديد </a>
                                        </li>
                                        <li><a href="<?php echo e(route('employee.show')); ?>" key="t-saas"> عرض الموظفين</a></li>

                                    </ul>
                                </li>
                            <?php endif; ?>
                            

                            
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

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
<?php /**PATH C:\Users\test\Downloads\New folder\POS\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>