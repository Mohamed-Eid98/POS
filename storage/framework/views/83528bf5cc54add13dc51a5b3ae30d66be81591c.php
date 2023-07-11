

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
            منطقه
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

                        <form class="dropzone" method="POST" action="<?php echo e(route('employee.update')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>


                            <div class="mb-3">

                            </div>

                            <div class="mb-12">
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 for="formrow-firstname-input" class="form-label my-3"> الاسم<span
                                                class="text-danger">*</span></h4>
                                        <input type="text" class="form-control" id="formrow-firstname-input"
                                            name="name" placeholder="ادخل الاسم  من فضلك">

                                    </div>
                                    <div class="col-md-6">
                                        <h4 for="formrow-firstname-input" class="form-label my-3"> رقم الهاتف<span
                                                class="text-danger">*</span></h4>
                                        <input type="text" class="form-control" id="formrow-firstname-input"
                                            name="phone" placeholder="ادخل اسم المنطقه من فضلك">

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 for="formrow-firstname-input" class="form-label my-3"> البريد الالكتروني<span
                                                class="text-danger">*</span></h4>
                                        <input type="text" class="form-control" id="formrow-firstname-input"
                                            name="email" placeholder="ادخل الاسم  من فضلك">

                                    </div>
                                    <div class="col-md-6 my-4">
                                        <div class="form-group">
                                            <h5> اسم الدور<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="role_id" id="role_id" class="form-control" required >
                                                    <option value="" selected disabled>-- اختر الدور--</option>

                                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <option value="<?php echo e($role->id); ?>" ><?php echo e($role->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                                </select>
                                                <?php $__errorArgs = ['role_id'];
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

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <h4 for="formrow-firstname-input" class="form-label my-3"> كلمه السر<span
                                            class="text-danger">*</span></h4>
                                    <input type="password" class="form-control" id="formrow-firstname-input" name="password"
                                        placeholder="ادخل كلمه السر  من فضلك">

                                </div>
                                <div class="col-md-6">
                                    <h4 for="formrow-firstname-input" class="form-label my-3"> صوره الموظف<span
                                            class="text-danger">*</span></h4>
                                    <input type="file" class="form-control" id="formrow-firstname-input" name="avatar">

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\test\Downloads\New folder\POS\resources\views/employee/addnewemployee.blade.php ENDPATH**/ ?>