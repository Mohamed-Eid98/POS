<?php $__env->startSection('title'); ?>
    إضافة قسم فرعي جديد
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/dropzone/min/dropzone.min.css')); ?>" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">إضافة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    قسم فرعي</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


    <?php if(session('Add')): ?>
        <div class="alert alert-success">
            <?php echo e(session('Add')); ?>

        </div>
    <?php endif; ?>

    <section class="content">
        <div class="row">


            <div class="col-12">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <form method="post" action="<?php echo e(route('subcategory.store')); ?>" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>

                                    <div class="form-group">
                                        <h5>القسم الرئيسي <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="cate_id" id="select" class="form-control">
                                                <option value="" selected disabled>-- اختر القسم الرئيسي--</option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['cate_id'];
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


                                    <div class="form-group">
                                        <h5 for="name">القسم الفرعي <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="name" name="name" class="form-control">
                                            <?php $__errorArgs = ['name'];
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
                                    <br>
                                    <div class="fallback">
                                        <img src="" id="mainThmb" alt="">
                                        <br><br>
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
                                <div class="text-center mt-4 mb-2">
                                    <input type="submit" class="btn btn-primary waves-effect waves-light" value="حفظ">
                                </div>
                            </form>

                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div>

        <!-- /.row -->
    </section>

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\test\Desktop\New folder (2)\POS\resources\views/sub_category/SubCategoryAdd.blade.php ENDPATH**/ ?>