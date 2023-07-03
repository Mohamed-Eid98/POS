
<?php $__env->startSection('title'); ?>
    تعديل قسم رئيسي
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('build/libs/dropzone/min/dropzone.min.css')); ?>" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">تعديل</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    قسم رئيسي</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


<?php if(session('edit')): ?>
<div class="alert alert-info">
    <?php echo e(session('edit')); ?>

</div>
<?php endif; ?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">تعديل القسم الرئيسي</h4>
                <p class="card-title-desc">
                </p>

                <div>

                    <form action="<?php echo e(route('category.update')); ?>" class="dropzone" method="POST" enctype="multipart/form-data" >
                        <?php echo csrf_field(); ?>

                    <input type="hidden" name="id" value="<?php echo e($category->id); ?>">

                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">اسم القسم الرئيسي<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="formrow-firstname-input" name="name" value="<?php echo e($category->name); ?>">
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger" ><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="fallback">

                                <?php if($category->getFirstMediaUrl('CategoryImages')): ?>
                                <img src="<?php echo e($category->getFirstMediaUrl('CategoryImages')); ?>" style="width: 130px;height:150px" id="mainThmb" alt="">
                                <br><br>
                                <?php else: ?>
                                <img src="" id="mainThmb" alt=""> <br><br>

                                <?php endif; ?>

                                <input type="file" name="pic" onChange="mainThamUrl(this)">
                                    <?php $__errorArgs = ['pic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger" ><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="dz-message needsclick">
                                <div class="mb-3">
                                    <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                </div>

                                <h4>ادخل الصوره هنا</h4>
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
    <script type="text/javascript">
        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThmb').attr('src', e.target.result).width(130).height(150);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\POS\resources\views/category/categoryEdit.blade.php ENDPATH**/ ?>