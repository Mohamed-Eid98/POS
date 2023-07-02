<?php $__env->startSection('title'); ?>
    عرض قسم رئيسي
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    <link
        href="<?php echo e(asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css')); ?>" />
    <link
        href="<?php echo e(asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css')); ?>" />


    <!-- Responsive datatable examples -->
    <link href="<?php echo e(asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>"
        rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            عرض
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
        قسم رئيسي
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>


    <?php if(session('delete')): ?>
    <div class="alert alert-success">
        <?php echo e(session('delete')); ?>

    </div>
    <?php endif; ?>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">عرض قسم رئيسي</h4>
                    <p class="card-title-desc">

                    </p>

                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="datatable_length"><label>عرض <select
                                            name="datatable_length" aria-controls="datatable"
                                            class="custom-select custom-select-sm form-control form-control-sm form-select form-select-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> entries</label></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="datatable_filter" class="dataTables_filter"><label>Search:<input type="search"
                                            class="form-control form-control-sm" placeholder=""
                                            aria-controls="datatable"></label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="datatable"
                                    class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline"
                                    role="grid" aria-describedby="datatable_info" style="width: 1566px;">
                                    <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th>الصوره</th>
                                            <th>القسم الرئيسي</th>
                                            <th>التعديلات</th>
                                        </tr>

                                    </thead>


                                    <tbody>


                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <?php if($category->getFirstMediaUrl('CategoryImages')): ?>
                                                    <img src="<?php echo e($category->getFirstMediaUrl('CategoryImages')); ?>" style="width: 60px;height:50px" alt="<?php echo e($category->title); ?>" class="img-fluid">

                                                    <?php else: ?>
                                                    <img src="<?php echo e(asset('uploads/on-C100969_Image_01.jpeg')); ?>" style="width: 60px;height:50px" alt="<?php echo e($category->title); ?>" class="img-fluid">

                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($category->category->name); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('category.edit', $category->id)); ?>" title="تعديل"
                                                        class="btn btn-info">
                                                        <i class="fas fa-edit"></i></a>
                                                    <a href="<?php echo e(route('category.delete', $category->id)); ?>"
                                                        class="btn btn-danger" title="حذف">
                                                        <i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\test\Desktop\New folder (2)\POS\resources\views/category/categoryViewPage.blade.php ENDPATH**/ ?>