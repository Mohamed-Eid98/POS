<?php $__env->startSection('title'); ?> إضافة كوبون<?php $__env->stopSection(); ?>

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
            كويون
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>










    <?php if(session('add')): ?>
        <div class="alert alert-success">
            <?php echo e(session('add')); ?>

        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">إضافة كوبون</h4>
                    <p class="card-title-desc">
                    </p>

                    <div>

                        <form action="<?php echo e(route('coupon.update')); ?>" class="dropzone" method="POST">
                            <?php echo csrf_field(); ?>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5> الاسم<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5> الكود<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="code" required>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <br>

                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5> نوع التخفيض</h5>
                                        <div class="controls">
                                            <select name="type_discount" id="select" class="form-control" required >
                                                <option value="" selected disabled>-- اختر النوع --</option>
                                                <option value="percentage" > نسبه مئويه </option>
                                                <option value="price" > سعر </option>
                                            </select>
                                            <?php $__errorArgs = ['type_discount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5> التخفيض<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="number" class="form-control" name="discount" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5> الحد الادني للشراء<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="number" class="form-control" name="min_price" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5> الحد الأقصي للشراء<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="number" class="form-control" name="max_price" required>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5> حد استخدام هذا الكوبون<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="number" class="form-control" name="limit" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5> حد استخدام لمستخدم واحد<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="number" class="form-control" name="limit_user" required>
                                        </div>
                                    </div>
                                </div>



                            </div>

<br>
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <label class="form-check-label" for="formCheckcolor1"> هل هذا الكوبون نشط ؟</label>
                                        <input class="form-check-input" type="checkbox" name="is_active" id="formCheckcolor1" value="1" >
                                    </fieldset>
                                </div>

                            </div>
                            <br>
                            <div class="row">

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <h5> تاريخ الانتهاء<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" class="form-control" name="end_date" required>
                                        </div>
                                        <?php $__errorArgs = ['end_date'];
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\test\Downloads\New folder\POS\resources\views/coupon/addcoupon.blade.php ENDPATH**/ ?>