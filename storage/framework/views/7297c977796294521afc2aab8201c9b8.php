<?php $__env->startSection('title'); ?> إضافة منطقه  <?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- Plugins css -->
    <link href="<?php echo e(URL::asset('build/libs/dropzone/min/dropzone.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>




<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> إضافة <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>  منطقه <?php $__env->endSlot(); ?>
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

                    <h4 class="card-title">إضافة منطقه جديده</h4>
                    <p class="card-title-desc">
                    </p>

                    <div>

                        <form action="<?php echo e(route('area.store')); ?>" class="dropzone" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>


                            <div class="mb-3">
                                <div class="form-group">
                                    <h5> البلد <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="country_id" id="country_id" class="form-control"  >
                                            <option value="" selected disabled >-- اختر البلد --</option>
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($country->id); ?>"><?php echo e($country->general_title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['country_id'];
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
                                    </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <h5> المحافظه <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="city_id" id="city_id" class="form-control"  >
                                            <option value="" selected disabled >-- اختر المحافظه --</option>

                                        </select>
                                        <?php $__errorArgs = ['city_id'];
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
                                    </div>
                            </div>

                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">اسم المنطقه <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="formrow-firstname-input" name="name" placeholder="ادخل اسم المنطقه من فضلك">
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
                                <div class="mb-3">
                                    <label for="price" class="form-label">سعر التوصيل  <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="price" name="price" placeholder="ادخل السعر من فضلك">
                                        <?php $__errorArgs = ['price'];
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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="country_id"]').change(function() {
            var country_id = $(this).val();
            $.get('/city-ajax-' + country_id, function(data) {


                var d = $('select[name="city_id"]').empty();
                $.each(data, function(key, value) {
                    $('select[name="city_id"]').append('<option value="' + value.id +
                        '">' + value.general_title + '</option>');
                });

            });
        });
    });
</script>

<?php $__env->startSection('js'); ?>


<?php $__env->startSection('script'); ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="cate_id"]').change(function() {
            var category_id = $(this).val();
            $.get('/ajax-' + category_id, function(data) {


                var d = $('select[name="subcate_id"]').empty();
                $.each(data, function(key, value) {
                    $('select[name="subcate_id"]').append('<option value="' + value.id +
                        '">' + value.name + '</option>');
                });

            });
        });
    });
</script>

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







<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\test\Desktop\New folder (2)\POS\resources\views/city/areaAdd.blade.php ENDPATH**/ ?>