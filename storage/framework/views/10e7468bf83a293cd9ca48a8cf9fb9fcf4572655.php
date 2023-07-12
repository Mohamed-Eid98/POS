<?php $__env->startSection('title'); ?> إضافة دور الموظف<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- Plugins css -->
    <link href="<?php echo e(URL::asset('build/libs/dropzone/min/dropzone.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>




<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            إضافة
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            دور موظف
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>










    <?php if(session('Add')): ?>
        <div class="alert alert-success">
            <?php echo e(session('Add')); ?>

        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">إضافة دور الموظف</h4>
                    <p class="card-title-desc">
                    </p>

                    <div>

                        <form action="<?php echo e(route('employee.update.role')); ?>" class="dropzone" method="POST"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5> الاسم <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-12">
                                <h4 for="formrow-firstname-input" class="form-label my-3"> المهام<span
                                        class="text-danger">*</span></h4>
                                <div class="row">

                                    <div class="col-md-3"> <input type="checkbox" id="checkbox_1" name="permissions[]"
                                            value="1">
                                        <label for="checkbox_1">اداره الاقسام</label>
                                    </div>
                                    <div class="col-md-3"> <input type="checkbox" id="checkbox_2" name="permissions[]"
                                            value="2">
                                        <label for="checkbox_2">اداره الطلبات</label>
                                    </div>
                                    <div class="col-md-3"> <input type="checkbox" id="checkbox_3" name="permissions[]"
                                            value="3">
                                        <label for="checkbox_3"> ادارة الاشعارات</label>
                                    </div>
                                    <div class="col-md-3"> <input type="checkbox" id="checkbox_4" name="permissions[]"
                                            value="5">
                                        <label for="checkbox_4">ادارة السياسات</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"> <input type="checkbox" id="checkbox_5" name="permissions[]"
                                            value="4">
                                        <label for="checkbox_5"> ادارة العملاء</label>
                                    </div>
                                    <div class="col-md-3"> <input type="checkbox" id="checkbox_6" name="permissions[]"
                                            value="8">
                                        <label for="checkbox_6"> لوحه التحكم</label>
                                    </div>
                                    <div class="col-md-3"> <input type="checkbox" id="checkbox_7" name="permissions[]"
                                            value="7">
                                        <label for="checkbox_7"> السوشيل ميديا </label>
                                    </div>
                                    <div class="col-md-3"> <input type="checkbox" id="checkbox_8" name="permissions[]"
                                            value="6">
                                        <label for="checkbox_8"> المحافظات</label>
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

<?php $__env->stopSection(); ?>




<?php $__env->startSection('js'); ?>


<?php $__env->startSection('script'); ?>




    <!-- JAVASCRIPT -->
    <script src="<?php echo e(asset('assets/libs/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/metismenu/metisMenu.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/simplebar/simplebar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/node-waves/waves.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/libs/select2/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/spectrum-colorpicker2/spectrum.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/@chenfengyuan/datepicker/datepicker.min.js')); ?>"></script>

    <!-- form advanced init -->
    <script src="<?php echo e(asset('assets/js/pages/form-advanced.init.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/js/app.js')); ?>"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\test\Downloads\New folder\POS\resources\views/employee/addemployeerole.blade.php ENDPATH**/ ?>