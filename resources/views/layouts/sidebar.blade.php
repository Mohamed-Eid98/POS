<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">




            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                {{-- <li class="menu-title" key="t-menu">الصفحه الرئيسيه</li> --}}

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">الصفحه الرئيسيه</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('root') }}" key="t-default">الصفحه الرئيسيه</a></li>
                    </ul>
                </li> --}}

                <li class="mm-active">
                    <a href="{{ route('root') }}" class="waves-effect active">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">الصفحه الرئيسيه</span>
                    </a>
                </li>



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
                @endphp

                @auth

                    @foreach (auth()->user()->role->permissions as $permission)
                        @if ($permission->name == 'categories' || $permission->name == 'admins')
                            <li class="menu-title" key="t-menu">الاقسام</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-home-circle"></i>
                                    <span key="t-dashboards">الاقسام الرئيسيه</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('category.add') }}" key="t-default">إضافة قسم رئيسي</a></li>
                                    <li><a href="{{ route('category.show') }}" key="t-saas">عرض الاقسام الرئيسيه</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-layout"></i>
                                    <span key="t-dashboards">الاقسام الفرعيه</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('subcategory.add') }}" key="t-default">إضافة قسم فرعي</a></li>
                                    <li><a href="{{ route('subcategory.show') }}" key="t-saas">عرض الاقسام الفرعيه</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-layout"></i>
                                    <span key="t-dashboards"> المنتجات</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('product.show') }}" key="t-wallet">جميع المنتجات</a></li>
                                    <li><a href="{{ route('product.add') }}" key="t-default">إضافة منتج</a></li>
                                    <li><a href="{{ route('product.tags') }}" key="t-saas" >الوسوم</a></li>
                                    <li><a href="{{ route('product.addcolorandsize') }}" key="t-blog" >السمات</a>
                                    </li>


                                </ul>
                            </li>
                @endif


                <ul class="metismenu list-unstyled" id="side-menu">
                    @if ($permission->name == 'orders' || $permission->name == 'admins')
                        <li class="menu-title" key="t-menu">الطلبيات</li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bx-task"></i>

                                <span key="t-dashboards">
                                    الطلبيات</span>
                                <span class="badge rounded-pill bg-danger float-end"> {{ $all_orders }}</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a class="slide-item" href="{{ route('orders.show') }}">
                                        {{-- <i class="fas fa-allergies"></i> --}}
                                        <span class="badge rounded-pill bg-info float-end">
                                            {{ $all_orders }}</span>
                                        كل الطلبات</a>
                                <li><a class="slide-item" href="{{ route('orders.pendingg') }}">
                                        {{-- <i class="fas fa-shopping-cart"></i> --}}
                                        <span class="badge rounded-pill bg-secondary float-end">
                                            {{ $pending_orders }}</span>
                                        طلبات معلقه</a>
                                </li>
                                <li><a class="slide-item" href="{{ route('orders.delivered') }}">
                                        {{-- <i class="fas fa-shipping-fast"></i> --}}
                                        <span class="badge rounded-pill bg-success float-end">
                                            {{ $deliered_orders }}</span>
                                        تم التسليم</a>
                                <li><a class="slide-item" href="{{ route('orders.inprograss') }}">

                                        {{-- <i class="far fa-clock"></i> --}}
                                        <span class="badge rounded-pill bg-info float-end">
                                            {{ $inPrograss_orders }}</span>
                                        قيد التوصيل</a>
                                <li><a class="slide-item" href="{{ route('orders.paid.show') }}">
                                        {{-- <i class="fas fa-check-circle"></i> --}}
                                        <span class="badge rounded-pill bg-primary float-end">
                                            {{ $paid_orders }}</span>
                                        تم الدفع</a>

                                <li><a class="slide-item" href="{{ route('orders.rejected') }}">
                                        {{-- <i class="fas fa-window-close"></i> --}}
                                        <span class="badge rounded-pill bg-danger float-end">
                                            {{ $rejected_orders }}</span>
                                        تم الرفض </a>
                                <li><a class="slide-item" href="{{ route('orders.cancelled') }}">
                                        {{-- <i class="fas fa-prescription-bottle-alt"></i> --}}
                                        <span class="badge rounded-pill bg-success float-end">
                                            {{ $cancelled_orders }}</span>
                                        تم الإلغاء </a>
                            </ul>
                        </li>
                    @endif
                    {{-- <li class="" key="t-menu">اضافه اشعارات</li> --}}






                    @if ($permission->name == 'customers' || $permission->name == 'admins')
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect my-3">
                                <i class="bx bx-list-ul"></i>

                                <span key="t-dashboards"> العملاء</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a class="slide-item" href="{{ route('users.show') }}">جميع العملاء</a>

                            </ul>
                        </li>
                    @endif
                    {{-- @if ($permission->name == 'customers' || $permission->name == 'admins') --}}
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect my-3">
                            <i class="bx bx-share-alt"></i>

                            <span key="t-dashboards"> التحليلات</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a class="slide-item" href="{{ route('public.view') }}"> النظره العامة</a>
                            <li><a class="slide-item" href="{{ route('storage.view') }}"> المخزون</a>

                        </ul>
                    </li>
                    {{-- @endif --}}

                    @if ($permission->name == 'cities' || $permission->name == 'admins')
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect my-3">
                                <i class="bx bx-envelope"></i>

                                <span key="t-dashboards"> المحافظات</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a class="slide-item" href="{{ route('city.add') }}"> اضافه محافظه </a>
                                <li><a class="slide-item" href="{{ route('city.show') }}"> عرض المحافظات </a>
                                <li><a class="slide-item" href="{{ route('area.add') }}"> اضافه منطقه </a>
                                <li><a class="slide-item" href="{{ route('area.show') }}"> عرض المناطق</a>
                            </ul>
                        </li>
                    @endif

                    @if ($permission->name == 'privacies' || $permission->name == 'admins')
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect my-3">
                                <i class="bx bx-task"></i>

                                <span key="t-dashboards"> السياسات</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a class="slide-item" href="{{ route('privacy.bene.show') }}">سياسة
                                        بنسايز</a>
                                <li><a class="slide-item" href="{{ route('privacy.delivery.show') }}"> سياسة
                                        التوصيل </a>
                                <li><a class="slide-item" href="{{ route('privacy.return.show') }}"> سياسة
                                        الارجاع </a>
                                <li><a class="slide-item" href="{{ route('privacy.warranty.show') }}"> سياسه
                                        الضمان</a>
                                <li><a class="slide-item" href="{{ route('privacy.terms.show') }}"> سياسات
                                        قانونيه</a>

                            </ul>
                        </li>
                    @endif
                    @if ($permission->name == 'notifications' || $permission->name == 'admins')
                        <li>

                            <a href="javascript: void(0);" class="has-arrow waves-effect my-3">
                                <i class="bx bx-store"></i>

                                <span key="t-dashboards menu-title"> اضافه اشعارات</span>

                                </h4>
                            </a>

                            <ul class="sub-menu" aria-expanded="false">
                                <li><a class="slide-item" href="{{ route('notification.add') }}"> اضافه اشعارات
                                    </a>
                                <li><a class="slide-item" href="{{ route('notification.show') }}"> عرض الاشعارات
                                    </a>

                            </ul>
                        </li>
                    @endif

                    @if ($permission->name == 'socials' || $permission->name == 'admins')
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect my-3">
                                <i class="bx bx-map"></i>
                                <span key="t-dashboards"> مواقع التواصل الاجتماعي</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a class="slide-item" href="{{ route('social.add') }}"> مواقع التواصل </a>


                            </ul>
                        </li>
                    @endif

                    @if ($permission->name == 'sliders' || $permission->name == 'admins')
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect my-3">
                                <i class="bx bx-aperture"></i>
                                <span key="t-dashboards"> البانر</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a class="slide-item" href="{{ route('slide.add') }}"> اضافه بانر</a>
                                <li><a class="slide-item" href="{{ route('slides.show') }}"> عرض بانرات</a>




                            </ul>
                        </li>
                    @endif

                    @if ($permission->name == 'coupons' || $permission->name == 'admins')
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect my-3">
                                <i class="bx bx-bitcoin"></i>
                                <span key="t-dashboards"> الكوبونات</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a class="slide-item" href="{{ route('coupon.add') }}"> اضافه كوبون</a>
                                <li><a class="slide-item" href="{{ route('coupon.show') }}"> عرض الكوبونات</a>


                            </ul>
                        </li>
                    @endif
                    @if ($permission->name == 'complains' || $permission->name == 'admins')
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect my-3">
                                <i class="bx bx-receipt"></i>

                                <span key="t-dashboards"> الشكاوي والمقترحات</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a class="slide-item" href="{{ route('complain.show') }}"> عرض الشكاوي</a>


                            </ul>
                        </li>
                    @endif

                    @if ($permission->name == 'employers' || $permission->name == 'admins')
                        <li class="menu-title" key="t-menu">قسم الموظفيين</li>
                        <li>
                        <li>

                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bx-home-circle"></i>
                                <span key="bx bxs-user-detail"> اضافه دور</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('employee.add.role') }}" key="t-saas"> اضافه
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
                                <li><a href="{{ route('employee.add') }}" key="t-saas"> اضافه موظف جديد </a>
                                </li>
                                <li><a href="{{ route('employee.show') }}" key="t-saas"> عرض الموظفين</a></li>

                            </ul>
                        </li>
                    @endif
                    {{-- <li class="menu-title" key="t-menu">الفواتير</li> --}}

                    {{-- <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect my-3">
                            <i class="bx bx-envelope"></i>

                            <span key="t-dashboards"> الفواتير</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a class="slide-item" href="{{ route('invoices.page') }}"> اضافه فاتوره </a>
                            <li><a class="slide-item" href="{{ route('invoices.page') }}"> عرض الفواتير </a>

                        </ul>
                    </li> --}}
                    @endforeach
                @endauth

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
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </li>




                {{-- <li class="menu-title" key="t-apps">@lang('translation.Apps')</li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-calendar"></i>
                            <span key="t-dashboards">@lang('translation.Calendars')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="calendar" key="t-tui-calendar">@lang('translation.TUI_Calendar')</a></li>
                            <li><a href="calendar-full" key="t-full-calendar">@lang('translation.Full_Calendar')</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="chat" class="waves-effect">
                            <i class="bx bx-chat"></i>
                            <span key="t-chat">@lang('translation.Chat')</span>
                        </a>
                    </li>

                    <li>
                        <a href="apps-filemanager" class="waves-effect">
                            <i class="bx bx-file"></i>
                            <span key="t-file-manager">@lang('translation.File_Manager')</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-store"></i>
                            <span key="t-ecommerce">@lang('translation.Ecommerce')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="ecommerce-products" key="t-products">@lang('translation.Products')</a></li>
                            <li><a href="ecommerce-product-detail" key="t-product-detail">@lang('translation.Product_Detail')</a></li>
                            <li><a href="ecommerce-orders" key="t-orders">@lang('translation.Orders')</a></li>
                            <li><a href="ecommerce-customers" key="t-customers">@lang('translation.Customers')</a></li>
                            <li><a href="ecommerce-cart" key="t-cart">@lang('translation.Cart')</a></li>
                            <li><a href="ecommerce-checkout" key="t-checkout">@lang('translation.Checkout')</a></li>
                            <li><a href="ecommerce-shops" key="t-shops">@lang('translation.Shops')</a></li>
                            <li><a href="ecommerce-add-product" key="t-add-product">@lang('translation.Add_Product')</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-bitcoin"></i>
                            <span key="t-crypto">@lang('translation.Crypto')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="crypto-wallet" key="t-wallet">@lang('translation.Wallet')</a></li>
                            <li><a href="crypto-buy-sell" key="t-buy">@lang('translation.Buy_Sell')</a></li>
                            <li><a href="crypto-exchange" key="t-exchange">@lang('translation.Exchange')</a></li>
                            <li><a href="crypto-lending" key="t-lending">@lang('translation.Lending')</a></li>
                            <li><a href="crypto-orders" key="t-orders">@lang('translation.Orders')</a></li>
                            <li><a href="crypto-kyc-application" key="t-kyc">@lang('translation.KYC_Application')</a></li>
                            <li><a href="crypto-ico-landing" key="t-ico">@lang('translation.ICO_Landing')</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-envelope"></i>
                            <span key="t-email">@lang('translation.Email')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="email-inbox" key="t-inbox">@lang('translation.Inbox')</a></li>
                            <li><a href="email-read" key="t-read-email">@lang('translation.Read_Email')</a></li>
                            <li>
                                <a href="javascript: void(0);">
                                    <span key="t-email-templates">@lang('translation.Templates')</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="email-template-basic" key="t-basic-action">@lang('translation.Basic_Action')</a>
                                    </li>
                                    <li><a href="email-template-alert" key="t-alert-email">@lang('translation.Alert_Email')</a></li>
                                    <li><a href="email-template-billing" key="t-bill-email">@lang('translation.Billing_Email')</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-receipt"></i>
                            <span key="t-invoices">@lang('translation.Invoices')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="invoices-list" key="t-invoice-list">@lang('translation.Invoice_List')</a></li>
                            <li><a href="invoices-detail" key="t-invoice-detail">@lang('translation.Invoice_Detail')</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-briefcase-alt-2"></i>
                            <span key="t-projects">@lang('translation.Projects')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="projects-grid" key="t-p-grid">@lang('translation.Projects_Grid')</a></li>
                            <li><a href="projects-list" key="t-p-list">@lang('translation.Projects_List')</a></li>
                            <li><a href="projects-overview" key="t-p-overview">@lang('translation.Project_Overview')</a>
                            </li>
                            <li><a href="projects-create" key="t-create-new">@lang('translation.Create_New')</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-task"></i>
                            <span key="t-tasks">@lang('translation.Tasks')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="tasks-list" key="t-task-list">@lang('translation.Task_List')</a></li>
                            <li><a href="tasks-kanban" key="t-kanban-board">@lang('translation.Kanban_Board')</a></li>
                            <li><a href="tasks-create" key="t-create-task">@lang('translation.Create_Task')</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bxs-user-detail"></i>
                            <span key="t-contacts">@lang('translation.Contacts')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="contacts-grid" key="t-user-grid">@lang('translation.User_Grid')</a></li>
                            <li><a href="contacts-list" key="t-user-list">@lang('translation.User_List')</a></li>
                            <li><a href="contacts-profile" key="t-profile">@lang('translation.Profile')</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-detail"></i>
                            <span key="t-blog">@lang('translation.Blog')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="blog-list" key="t-blog-list">@lang('translation.Blog_List')</a></li>
                            <li><a href="blog-grid" key="t-blog-grid">@lang('translation.Blog_Grid')</a></li>
                            <li><a href="blog-details" key="t-blog-details">@lang('translation.Blog_Details')</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <span class="badge rounded-pill bg-success float-end"
                                key="t-new">@lang('translation.New')</span>
                            <i class="bx bx-briefcase-alt"></i>
                            <span key="t-jobs">@lang('translation.Jobs')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="job-list" key="t-job-list">@lang('translation.Job_List')</a></li>
                            <li><a href="job-grid" key="t-job-grid">@lang('translation.Job_Grid')</a></li>
                            <li><a href="job-apply" key="t-apply-job">@lang('translation.Apply_Job')</a></li>
                            <li><a href="job-details" key="t-job-details">@lang('translation.Job_Details')</a></li>
                            <li><a href="job-categories" key="t-Jobs-categories">@lang('translation.Jobs_Categories')</a></li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow"
                                    key="t-candidate">@lang('translation.Candidate')</a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="candidate-list" key="t-list">@lang('translation.List')</a></li>
                                    <li><a href="candidate-overview" key="t-overview">@lang('translation.Overview')</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-title" key="t-pages">@lang('translation.Pages')</li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-user-circle"></i>
                            <span key="t-authentication">@lang('translation.Authentication')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="auth-login" key="t-login">@lang('translation.Login')</a></li>
                            <li><a href="auth-login-2" key="t-login-2">@lang('translation.Login') 2</a></li>
                            <li><a href="auth-register" key="t-register">@lang('translation.Register')</a></li>
                            <li><a href="auth-register-2" key="t-register-2">@lang('translation.Register') 2</a></li>
                            <li><a href="auth-recoverpw" key="t-recover-password">@lang('translation.Recover_Password')</a>
                            </li>
                            <li><a href="auth-recoverpw-2" key="t-recover-password-2">@lang('translation.Recover_Password')
                                    2</a></li>
                            <li><a href="auth-lock-screen" key="t-lock-screen">@lang('translation.Lock_Screen')</a></li>
                            <li><a href="auth-lock-screen-2" key="t-lock-screen-2">@lang('translation.Lock_Screen') 2</a>
                            </li>
                            <li><a href="auth-confirm-mail" key="t-confirm-mail">@lang('translation.Confirm_Mail')</a></li>
                            <li><a href="auth-confirm-mail-2" key="t-confirm-mail-2">@lang('translation.Confirm_Mail') 2</a>
                            </li>
                            <li><a href="auth-email-verification" key="t-email-verification">@lang('translation.Email_verification')</a>
                            </li>
                            <li><a href="auth-email-verification-2" key="t-email-verification-2">@lang('translation.Email_verification')
                                    2</a>
                            </li>
                            <li><a href="auth-two-step-verification"
                                    key="t-two-step-verification">@lang('translation.Two_step_verification')</a>
                            </li>
                            <li><a href="auth-two-step-verification-2"
                                    key="t-two-step-verification-2">@lang('translation.Two_step_verification')
                                    2</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-file"></i>
                            <span key="t-utility">@lang('translation.Utility')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="pages-starter" key="t-starter-page">@lang('translation.Starter_Page')</a></li>
                            <li><a href="pages-maintenance" key="t-maintenance">@lang('translation.Maintenance')</a></li>
                            <li><a href="pages-comingsoon" key="t-coming-soon">@lang('translation.Coming_Soon')</a></li>
                            <li><a href="pages-timeline" key="t-timeline">@lang('translation.Timeline')</a></li>
                            <li><a href="pages-faqs" key="t-faqs">@lang('translation.FAQs')</a></li>
                            <li><a href="pages-pricing" key="t-pricing">@lang('translation.Pricing')</a></li>
                            <li><a href="pages-404" key="t-error-404">@lang('translation.Error_404')</a></li>
                            <li><a href="pages-500" key="t-error-500">@lang('translation.Error_500')</a></li>
                        </ul>
                    </li>

                    <li class="menu-title" key="t-components">@lang('translation.Components')</li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-tone"></i>
                            <span key="t-ui-elements">@lang('translation.UI_Elements')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="ui-alerts" key="t-alerts">@lang('translation.Alerts')</a></li>
                            <li><a href="ui-buttons" key="t-buttons">@lang('translation.Buttons')</a></li>
                            <li><a href="ui-cards" key="t-cards">@lang('translation.Cards')</a></li>
                            <li><a href="ui-carousel" key="t-carousel">@lang('translation.Carousel')</a></li>
                            <li><a href="ui-dropdowns" key="t-dropdowns">@lang('translation.Dropdowns')</a></li>
                            <li><a href="ui-grid" key="t-grid">@lang('translation.Grid')</a></li>
                            <li><a href="ui-images" key="t-images">@lang('translation.Images')</a></li>
                            <li><a href="ui-lightbox" key="t-lightbox">@lang('translation.Lightbox')</a></li>
                            <li><a href="ui-modals" key="t-modals">@lang('translation.Modals')</a></li>
                            <li><a href="ui-offcanvas" key="t-offcanvas">@lang('translation.Offcanvas')</a></li>
                            <li><a href="ui-rangeslider" key="t-range-slider">@lang('translation.Range_Slider')</a></li>
                            <li><a href="ui-session-timeout" key="t-session-timeout">@lang('translation.Session_Timeout')</a></li>
                            <li><a href="ui-progressbars" key="t-progress-bars">@lang('translation.Progress_Bars')</a></li>
                            <li><a href="ui-placeholders" key="t-placeholders">@lang('translation.Placeholders')</a></li>
                            <li><a href="ui-sweet-alert" key="t-sweet-alert">@lang('translation.Sweet_Alert')</a></li>
                            <li><a href="ui-tabs-accordions" key="t-tabs-accordions">@lang('translation.Tabs_&_Accordions')</a></li>
                            <li><a href="ui-typography" key="t-typography">@lang('translation.Typography')</a></li>
                            <li><a href="ui-toasts" key="t-toasts">@lang('translation.Toasts')</a></li>
                            <li><a href="ui-video" key="t-video">@lang('translation.Video')</a></li>
                            <li><a href="ui-general" key="t-general">@lang('translation.General')</a></li>
                            <li><a href="ui-colors" key="t-colors">@lang('translation.Colors')</a></li>
                            <li><a href="ui-rating" key="t-rating">@lang('translation.Rating')</a></li>
                            <li><a href="ui-notifications" key="t-notifications">@lang('translation.Notifications')</a></li>
                            <li><a href="ui-utilities"><span key="t-utilities">@lang('translation.Utilities')</span> <span
                                        class="badge rounded-pill bg-success float-end"
                                        key="t-new">@lang('translation.New')</span></a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="bx bxs-eraser"></i>
                            <span class="badge rounded-pill bg-danger float-end">10</span>
                            <span key="t-forms">@lang('translation.Forms')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="form-elements" key="t-form-elements">@lang('translation.Form_Elements')</a></li>
                            <li><a href="form-layouts" key="t-form-layouts">@lang('translation.Form_Layouts')</a></li>
                            <li><a href="form-validation" key="t-form-validation">@lang('translation.Form_Validation')</a>
                            </li>
                            <li><a href="form-advanced" key="t-form-advanced">@lang('translation.Form_Advanced')</a></li>
                            <li><a href="form-editors" key="t-form-editors">@lang('translation.Form_Editors')</a></li>
                            <li><a href="form-uploads" key="t-form-upload">@lang('translation.Form_File_Upload')</a></li>
                            <li><a href="form-xeditable" key="t-form-xeditable">@lang('translation.Form_Xeditable')</a></li>
                            <li><a href="form-repeater" key="t-form-repeater">@lang('translation.Form_Repeater')</a></li>
                            <li><a href="form-wizard" key="t-form-wizard">@lang('translation.Form_Wizard')</a></li>
                            <li><a href="form-mask" key="t-form-mask">@lang('translation.Form_Mask')</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-list-ul"></i>
                            <span key="t-tables">@lang('translation.Tables')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="tables-basic" key="t-basic-tables">@lang('translation.Basic_Tables')</a></li>
                            <li><a href="tables-datatable" key="t-data-tables">@lang('translation.Data_Tables')</a></li>
                            <li><a href="tables-responsive" key="t-responsive-table">@lang('translation.Responsive_Table')</a></li>
                            <li><a href="tables-editable" key="t-editable-table">@lang('translation.Editable_Table')</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bxs-bar-chart-alt-2"></i>
                            <span key="t-charts">@lang('translation.Charts')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="charts-apex" key="t-apex-charts">@lang('translation.Apex_Charts')</a></li>
                            <li><a href="charts-echart" key="t-e-charts">@lang('translation.E_Charts')</a></li>
                            <li><a href="charts-chartjs" key="t-chartjs-charts">@lang('translation.Chartjs_Charts')</a></li>
                            <li><a href="charts-flot" key="t-flot-charts">@lang('translation.Flot_Charts')</a></li>
                            <li><a href="charts-tui" key="t-ui-charts">@lang('translation.Toast_UI_Charts')</a></li>
                            <li><a href="charts-knob" key="t-knob-charts">@lang('translation.Jquery_Knob_Charts')</a></li>
                            <li><a href="charts-sparkline" key="t-sparkline-charts">@lang('translation.Sparkline_Charts')</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-aperture"></i>
                            <span key="t-icons">@lang('translation.Icons')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="icons-boxicons" key="t-boxicons">@lang('translation.Boxicons')</a></li>
                            <li><a href="icons-materialdesign" key="t-material-design">@lang('translation.Material_Design')</a></li>
                            <li><a href="icons-dripicons" key="t-dripicons">@lang('translation.Dripicons')</a></li>
                            <li><a href="icons-fontawesome" key="t-font-awesome">@lang('translation.Font_awesome')</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-map"></i>
                            <span key="t-maps">@lang('translation.Maps')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="maps-google" key="t-g-maps">@lang('translation.Google_Maps')</a></li>
                            <li><a href="maps-vector" key="t-v-maps">@lang('translation.Vector_Maps')</a></li>
                            <li><a href="maps-leaflet" key="t-l-maps">@lang('translation.Leaflet_Maps')</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-share-alt"></i>
                            <span key="t-multi-level">@lang('translation.Multi_Level')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="javascript: void(0);" key="t-level-1-1">@lang('translation.Level_1.1')</a></li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow"
                                    key="t-level-1-2">@lang('translation.Level_1.2')</a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="javascript: void(0);" key="t-level-2-1">@lang('translation.Level_2.1')</a>
                                    </li>
                                    <li><a href="javascript: void(0);" key="t-level-2-2">@lang('translation.Level_2.2')</a>
                                    </li> --}}
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
