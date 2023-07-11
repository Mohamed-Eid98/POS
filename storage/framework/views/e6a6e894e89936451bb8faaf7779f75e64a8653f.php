<?php $__env->startSection('title'); ?>
    إضافة بانر
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- Plugins css -->
    <link href="<?php echo e(URL::asset('assets/plugins/owl-carousel/owl.carousel.css')); ?>" rel="stylesheet" />
    <!-- Maps css -->
    <link href="<?php echo e(URL::asset('assets/plugins/jqvmap/jqvmap.min.css')); ?>" rel="stylesheet">


    <link href="<?php echo e(asset('assets/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')); ?>" rel="stylesheet"
        type="text/css">
    <link href="<?php echo e(asset('assets/libs/spectrum-colorpicker2/spectrum.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/libs/bootstrap-timepicker/css/bootstrap-timepicker.min.css')); ?>" rel="stylesheet"
        type="text/css">
    <link href="<?php echo e(asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')); ?>" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/@chenfengyuan/datepicker/datepicker.min.css')); ?>">

    <!-- Bootstrap Css -->
    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo e(asset('assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('build/libs/dropzone/min/dropzone.min.css')); ?>" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>




<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            إضافة
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            بانر
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

                    <h4 class="card-title">إضافة بانر</h4>
                    <p class="card-title-desc">
                    </p>

                    <div>

                        <form action="<?php echo e(route('slide.update')); ?>" class="dropzone" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <h5>نوع البانر <span class="text-danger">*</span></h5>
                                    <div class="controls">

                                        <select name="type" id="select" class="form-control" onchange="updateSecondSelect(this.value)">
                                            <option value="" selected disabled>-- اختر النوع
                                                --
                                            </option>
                                            <option value="Product" >منتج </option>
                                            <option value="Category" >قسم</option>
                                            <option value="MultiProduct" >منتاجات</option>
                                        </select>
                                        <?php $__errorArgs = ['type'];
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
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label class="form-label">نوع المنتج </label>

                                    <select name="type_id[]" id="secondSelect" class="select2 form-control select2-multiple" multiple="multiple"
                                    data-placeholder="Choose ...">
                                    <option value="" selected disabled>-- اختر النوع
                                        --
                                    </option>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-3">

                                <div class="mb-3">
                                    <label class="form-label">الترتيب </label>

                                    <input type="number" name="sort" id="" class="form-control">

                                </div>
                            </div>



                            <div class="box">
                                <div class="box-header with-border">
                                    <h4 class="box-title">إضافة صوره </h4>
                                </div>
                                <hr>
                                <!-- start 2nd row  -->



                                <div class="fallback">
                                    <img src="" id="mainThmb" alt="">
                                    <br><br>
                                    <input type="file" name="pic" onChange="mainThamUrl(this)" required>
                                    <?php $__errorArgs = ['pic'];
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
                                <div class="dz-message needsclick">
                                    <div class="mb-3">
                                        <i class="display-4 text-muted bx bxs-cloud-upload text-center"></i>
                                    </div>

                                    <h4>ادخل الصوره هنا</h4>
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
    <!-- JAVASCRIPT -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script src="<?php echo e(asset('assets/libs/jquery/jquery.min.js')); ?>"></script>



<script>

function updateSecondSelect(selectedValue) {
  var type = selectedValue;
  var secondSelect = document.getElementById("secondSelect");

  // Clear any existing options and remove the multiple attribute
  secondSelect.innerHTML = "";
  secondSelect.removeAttribute("multiple");

  // Fetch the options from the server using AJAX
  var url = '/api-' + (type == 'Category' ? 'categories' : 'products') + '?type=' + encodeURIComponent(type);
  fetch(url)
    .then(response => response.json())
    .then(options => {
      options.forEach(option => {
        var optionElement = document.createElement("option");
        optionElement.value = option.id;
        optionElement.text = option.name;
        secondSelect.appendChild(optionElement);
      });

      // If the selected value is "MultiProduct", add the multiple attribute
      if (type === "MultiProduct") {
        secondSelect.setAttribute("multiple", "multiple");
      }
    })
    .catch(error => console.error(error));
}

</script>

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\test\Downloads\New folder\POS\resources\views/slides/addslides.blade.php ENDPATH**/ ?>