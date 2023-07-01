<?php $__env->startSection('title'); ?>
    إضافةاشعار
<?php $__env->stopSection(); ?>

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
            اشعار
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

                    <h4 class="card-title"> الاشعار</h4>
                    <p class="card-title-desc">
                    </p>



                    <form action="<?php echo e(route('city.store')); ?>" class="dropzone" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>




                        <div class="text-center mt-4">
                            <input type="submit" class="btn btn-primary waves-effect waves-light" value="حفظ">
                        </div>
                    </form>






                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
<?php $__env->stopSection(); ?>





<?php $__env->startSection('script'); ?>
    <!-- Plugins js -->
    



    <!-- JAVASCRIPT -->
    
<?php $__env->stopSection(); ?>









<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\POS-main1\resources\views/notification/notificationAdd.blade.php ENDPATH**/ ?>