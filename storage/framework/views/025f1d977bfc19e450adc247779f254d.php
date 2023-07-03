<?php $__env->startSection('title'); ?>
    عرض المنتجات
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    <link
        href="<?php echo e(asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css')); ?>" />
    <link
        href="<?php echo e(asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css')); ?>" />


    <!-- Responsive datatable examples -->
    <link href="<?php echo e(asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet"
        type="text/css" />
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            عرض
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            المنتجات
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <?php if(session('delete')): ?>
        <div class="alert alert-success">
            <?php echo e(session('delete')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('edit')): ?>
        <div class="alert alert-success">
            <?php echo e(session('edit')); ?>

        </div>
    <?php endif; ?>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">عرض المنتجات </h4>
                    <p class="card-title-desc">

                    </p>

                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example"
                                    class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline"
                                    role="grid" aria-describedby="datatable_info" style="width: 100%">
                                    <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th>الصوره</th>
                                            <th>اسم المنتج</th>
                                            <th>الكود</th>
                                            <th>القسم الفرعي</th>
                                            <th>السعر (دينار عراقي)</th>
                                            <th>الحد الادني (دينار عراقي)</th>
                                            <th>معدل الزياده (دينار عراقي)</th>
                                            <th>عدد التكرار</th>
                                            <th>الحد الاقصي (دينار عراقي)</th>
                                            <th>الكميه </th>
                                            <th>جديد </th>
                                            <th>الافضل مبيعاً </th>
                                            <th>عليه عرض </th>
                                            <th>وصل حديثاً </th>
                                            <th>التعديلات</th>
                                        </tr>

                                    </thead>


                                    <tbody>

                                        <?php $i = 0; ?>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $i++; ?>
                                            <tr>
                                                <td><?php echo e($i); ?></td>
                                                <td>
                                                    <?php if($product->image): ?>
                                                        <img src="<?php echo e($product->image); ?>" alt=""
                                                            style="width: 40px; height:50px">
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset('uploads/on-C100969_Image_01.jpeg')); ?>"
                                                            alt="" style="width: 40px; height:50px">
                                                    <?php endif; ?>
                                                </td>
                                                <td> <strong> <?php echo e($product->name); ?> </strong> </td>
                                                <td>
                                                    <span class="badge text-bg-danger"><?php echo e($product->code); ?></span>

                                                </td>
                                                <td> <strong> <a
                                                            href="<?php echo e(route('product.show.subcategory', $product->id)); ?>">
                                                            <?php echo e($product->subcategory->name); ?> </a></strong></td>

                                                <td> <strong> <?php echo e($product->price); ?> د.ع. </strong></td>
                                                <td> <strong> <?php echo e($product->min_price); ?> د.ع. </strong></td>
                                                <td><strong> <?php echo e($product->increase_ratio); ?> د.ع. </strong></td>
                                                <td> <b> <?php echo e($product->repeat_times); ?> </b> </td>
                                                <td>
                                                    <strong><?php echo e($product->min_price + ($product->repeat_times + 1) * $product->increase_ratio); ?>

                                                        د.ع.
                                                    </strong>
                                                </td>
                                                <td><strong> <?php echo e($product->product_qty); ?> </strong></td>
                                                <td>
                                                    <?php if($product->is_new == 1): ?>
                                                        <span class="badge text-bg-secondary">نعم</span>
                                                    <?php else: ?>
                                                        <span class="badge text-bg-danger">لا</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($product->is_best_seller == 1): ?>
                                                        <span class="badge text-bg-secondary">نعم</span>
                                                    <?php else: ?>
                                                        <span class="badge text-bg-danger">لا</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($product->is_on_sale == 1): ?>
                                                        <span class="badge text-bg-secondary">نعم</span>
                                                    <?php else: ?>
                                                        <span class="badge text-bg-danger">لا</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($product->is_new_arrival == 1): ?>
                                                        <span class="badge text-bg-secondary">نعم</span>
                                                    <?php else: ?>
                                                        <span class="badge text-bg-danger">لا</span>
                                                    <?php endif; ?>
                                                </td>

                                                <td>


                                                    



                                                    
                                                    


                                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="تعديل ">
                                                            <a href="<?php echo e(route('product.edit', $product->id)); ?>"
                                                                class="btn btn-sm btn-soft-primary"><i
                                                                    class="mdi mdi-pencil-outline"></i></a>
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="ارسال اشعار">
                                                            <?php if($product->product_qty == 0): ?>
                                                                <a href="<?php echo e(route('product.quentity.zero', $product->id)); ?>"
                                                                    class="btn
                                                                    btn-sm btn-soft-info"><i
                                                                        class="fas fa-bell"></i></a>
                                                            <?php elseif($product->product_qty < 10): ?>
                                                                <a href="<?php echo e(route('product.quentity.ten', $product->id)); ?>"
                                                                    class="btn
                                                                btn-sm btn-soft-info"><i
                                                                        class="fas fa-bell"></i></a>
                                                            <?php else: ?>
                                                            <?php endif; ?>
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                            <a href="<?php echo e(route('product.delete', $product->id)); ?>"
                                                                title="حذف" class="btn btn-sm btn-soft-danger"><i
                                                                    class="mdi mdi-delete-outline"></i></a>
                                                        </li>
                                                    </ul>

                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    <?php $__env->stopSection(); ?>








    <script>
        $(function(e) {
            //file export datatable
            var table = $('#example').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis'],
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ ',
                }
            });
            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');

            $('#example1').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_',
                }
            });
            $('#example2').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_',
                }
            });
            var table = $('#example-delete').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_',
                }
            });
            $('#example-delete tbody').on('click', 'tr', function() {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });

            $('#button').click(function() {
                table.row('.selected').remove().draw(false);
            });

            //Details display datatable
            $('#example-1').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_',
                },
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function(row) {
                                var data = row.data();
                                return 'Details for ' + data[0] + ' ' + data[1];
                            }
                        }),
                        renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                            tableClass: 'table border mb-0'
                        })
                    }
                }
            });
        });
    </script>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\test\Desktop\New folder (2)\POS\resources\views/product/productView.blade.php ENDPATH**/ ?>