

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
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">عرض المنتجات </h4>
                    <p class="card-title-desc">

                    </p>

                    <form action="<?php echo e(route('product.search')); ?>" method="POST" >
                        <?php echo csrf_field(); ?>

                        <div class="row">
                            <!-- start 1st row  -->

                            <div class="col-md-2">

                                <div class="form-group">
                                    <div class="controls">
                                        <select name="subcate_id" id="select" class="form-control">
                                            <option value="" selected disabled><b>تصينفات</b></option>
                                            <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($subcategory->id); ?>"><?php echo e($subcategory->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['subcate_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                            </div> <!-- end col md 6 -->


                            <div class="col-md-2">

                                <div class="form-group">
                                    <div class="controls">
                                        <select name="product_name" id="select" class="form-control">
                                            <option value="" selected disabled><b> الفرز حسب نوع المنتج</b></option>
                                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['product_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                            </div> <!-- end col md 6 -->

                            <div class="col-md-2">

                                <div class="form-group">
                                    <div class="controls">
                                        <select name="status" id="select" class="form-control">
                                            <option value="" selected disabled><b>الفرز حسب حالة المخزون</b></option>
                                            <option value="0">غير متوفر في المخزون</option>
                                            <option value="1">متوفر في المخزون</option>
                                        </select>
                                        <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                            </div> <!-- end col md 6 -->
                            <div class="col-md-1">

                                <div class="form-group">
                                    <div class="controls">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="تصفيه">

                                        <?php $__errorArgs = ['subcate_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                            </div> <!-- end col md 6 -->

                        </div> <!-- end 1st row  -->

                        <br>
                    </form>


                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example" class="table table-striped my-3" role="grid"
                                    aria-describedby="datatable_info" style="width: 100%">

                                    <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th>الصوره</th>
                                            <th>الاسم </th>
                                            <th>رمز المنتج (SKU) </th>
                                            <th>المخزون</th>
                                            <th>السعر </th>
                                            <th> التصينفات</th>
                                            
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
                                                    <?php if($product->getFirstMediaUrl('images')): ?>
                                                        <img src="<?php echo e($product->getFirstMediaUrl('images')); ?>"
                                                            style="width: 60px;height:50px" alt="<?php echo e($product->title); ?>"
                                                            class="img-fluid">
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset('uploads/on-C100969_Image_01.jpeg')); ?>"
                                                            style="width: 60px;height:50px" alt="<?php echo e($product->title); ?>"
                                                            class="img-fluid">
                                                    <?php endif; ?>
                                                </td>
                                                <td> <?php echo e($product->name); ?> </td>
                                                <td>
                                                    <span class="badge text-bg-danger"><?php echo e($product->code); ?></span>

                                                </td>
                                                <td>
                                                    <?php if($product->product_qty == 0): ?>
                                                           <b><span style="color:  rgb(164, 215, 46)">غير متوفر في المخزون</span></b>
                                                    <?php else: ?>
                                                    <b><span style="color: rgb(164, 215, 46)"> متوفر في المخزون</span></b>

                                                    <?php endif; ?>
                                                </td>
                                                <td> <?php echo e($product->price); ?> د.ع. </td>
                                                <td>
                                                    <?php if($product->subcategory): ?>
                                                        <a href="<?php echo e(route('product.show.subcategory', $product->id)); ?>">
                                                            <?php echo e($product->subcategory->category->name); ?>,<?php echo e($product->subcategory->name); ?> </a>
                                                    <?php else: ?>
                                                        لا يوجد
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
        </div>
    </div>

            </div> <!-- end col -->
        </div>
    <?php $__env->stopSection(); ?>





    <?php $__env->startSection('js'); ?>
        <script>
            $(function(e) {
                //file export datatable
                var table = $('#example').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf', 'colvis'],
                    responsive: true,
                    language: {
                        searchPlaceholder: 'ابحث هنا',
                        sSearch: '',
                        lengthMenu: '_MENU_ ',
                    }
                });
                table.buttons().container()
                    .appendTo('#example_wrapper .col-md-6:eq(0)');

                $('#example1').DataTable({
                    language: {
                        searchPlaceholder: 'ابحث هنا',
                        sSearch: '',
                        lengthMenu: '_MENU_',
                    }
                });
                $('#example2').DataTable({
                    responsive: true,
                    language: {
                        searchPlaceholder: 'ابحث هنا',
                        sSearch: '',
                        lengthMenu: '_MENU_',
                    }
                });
                var table = $('#example-delete').DataTable({
                    responsive: true,
                    language: {
                        searchPlaceholder: 'ابحث هنا',
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
                        searchPlaceholder: 'ابحث هنا',
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
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\test\Downloads\New folder\POS\resources\views/product/productView.blade.php ENDPATH**/ ?>