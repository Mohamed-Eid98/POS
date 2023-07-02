
<?php $__env->startSection('title'); ?>
    اضافة منتج
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <!--  Owl-carousel css-->
    <link href="<?php echo e(URL::asset('assets/plugins/owl-carousel/owl.carousel.css')); ?>" rel="stylesheet" />
    <!-- Maps css -->
    <link href="<?php echo e(URL::asset('assets/plugins/jqvmap/jqvmap.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">اضافة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    منتج جديد</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


    <?php if(session('add')): ?>
        <div class="alert alert-success">
            <?php echo e(session('add')); ?>

        </div>
    <?php endif; ?>

    

    <form method="POST" action="<?php echo e(route('product.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>


        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">


                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">إضافة منتج </h4>
                            </div>
                            <hr>
                            <!-- start 2nd row  -->


                            <div class="form-group">
                                <h5 for="name">أسم المنتج <span class="text-danger">*</span>
                                </h5>
                                <div class="controls">
                                    <input type="text" id="name" name="name" value="<?php echo e($product->name); ?>" class="form-control">
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

                            <div class="form-group">
                                <h5 for="desc">وصف المنتج <span class="text-danger">*</span>
                                </h5>
                                <div class="controls">
                                    <textarea name="desc"  class="form-control" id="desc" cols="10" rows="5"><?php echo e($product->description); ?></textarea>
                                    <?php $__errorArgs = ['desc'];
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
                                <div class="col-md-6">

                                    <h5 for="code">الكود</h5>
                                    <div class="controls">
                                        <input type="text" name="code" value="<?php echo e($product->code); ?>" class="form-control" />
                                        <?php $__errorArgs = ['code'];
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
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">


                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title"> الاقسام</h4>
                        </div>
                        <hr>
                        <!-- start 2nd row  -->


                    </div>


                    <div class="row"> <!-- start 1st row  -->

                        <div class="col-md-6">

                            <div class="form-group">
                                <h5>القسم الرئيسي <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="cate_id" id="select" class="form-control"  >
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['cate_id'];
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

                        </div> <!-- end col md 6 -->


                        <div class="col-md-6">

                            <div class="form-group">
                                <h5>القسم الفرعي <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="subcate_id" id="select" class="form-control"  >
                                        <option value="" selected disabled >-- اختر القسم الفرعي--</option>
                                    </select>
                                    <?php $__errorArgs = ['subcate_id'];
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

                        </div> <!-- end col md 6 -->

                    </div> <!-- end 1st row  -->



                </div>
            </div>
        </div>
    </div>




            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">


                            <div class="box">
                                <div class="box-header with-border">
                                    <h4 class="box-title"> معلومات</h4>
                                </div>
                                <hr>
                                <!-- start 2nd row  -->


                            </div>
                            <div class="row">
                                <!-- start 1st row  -->

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <h5>اللون <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="color" id="select" class="form-control" required>
                                                <option value="" selected disabled>-- اختر اللون
                                                    --
                                                </option>
                                                <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($color->id); ?>">
                                                        <?php echo e($color->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['color'];
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


                                <div class="col-md-6">

                                    <div class="form-group">
                                        <h5>المقاس <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="size" id="select" class="form-control" required>
                                                <option value="" selected disabled>-- اختر المقاس
                                                    --
                                                </option>
                                                <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($size->id); ?>" >
                                                        <?php echo e($size->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['size'];
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
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">


                            <div class="box">
                                <div class="box-header with-border">
                                    <h4 class="box-title">الاسعار   </h4>
                                </div>
                                <hr>
                                <!-- start 2nd row  -->

<div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5 for="price"> السعر <span class="text-danger">*</span>
                                        </h5>
                                        <div class="controls">
                                            <input type="text" id="price" name="price" value="<?php echo e($product->price); ?>" class="form-control">
                                            <?php $__errorArgs = ['price'];
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

<div class="row">

                            <div class="col-md-4">
                            <div class="form-group">
                                    <h5 for="min_price"> الحد الادني <span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <input type="text" id="min_price" name="min_price" value="<?php echo e($product->min_price); ?>" class="form-control">
                                        <?php $__errorArgs = ['min_price'];
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



                            <div class="col-md-4">
                            <div class="form-group">
                                    <h5 for="repeated_times"> عدد التكرار <span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <input type="text" id="repeated_times" name="repeated_times" value="<?php echo e($product->repeat_times); ?>" class="form-control">
                                        <?php $__errorArgs = ['repeated_times'];
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

                            <div class="col-md-4">
                            <div class="form-group">
                                    <h5 for="increase_ratio"> الزياده <span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <input type="text" id="increase_ratio" name="increase_ratio" value="<?php echo e($product->increase_ratio); ?>" class="form-control">
                                        <?php $__errorArgs = ['increase_ratio'];
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
                    </div>
                </div>
            </div>
        </div>








            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">


                            <div class="box">
                                <div class="box-header with-border">
                                    <h4 class="box-title">إضافة صوره </h4>
                                </div>
                                <hr>
                                <!-- start 2nd row  -->



                                <div class="fallback">
                                    <img src="" id="mainThmb" alt="">
                                    <br><br>
                                        <input type="file" name="pic"  onChange="mainThamUrl(this)">
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
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_1" name="new" value="1" <?php echo e($product->is_new == 1 ? 'checked' : ''); ?>>
                                        <label for="checkbox_1">جديد</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_2" name="sale" value="1" <?php echo e($product->is_on_sale == 1 ? 'checked' : ''); ?>>
                                        <label for="checkbox_2">عرض</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_3" name="new_arrival" value="1" <?php echo e($product->is_new_arrival == 1 ? 'checked' : ''); ?>>
                                        <label for="checkbox_3">لم يصل</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_4" name="best_seller" value="1" <?php echo e($product->is_best_seller == 1 ? 'checked' : ''); ?>>
                                        <label for="checkbox_4">الافضل مبيعاً</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-xs-right">
                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="اضافة منتج">
            </div>


        </div>
        </div>
    </form>





    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->

    </section>
    <!-- /.content -->
    </div>

<?php $__env->stopSection(); ?>




<?php $__env->startSection('js'); ?>





<script type="text/javascript">

$(document).ready(function() {
    $('select[name="cate_id"]').change(function() {
        var category_id = $(this).val();
        $.get('/ajax-' + category_id, function(data) {


            var d =$('select[name="subcate_id"]').empty();
        $.each(data, function(key, value){
            $('select[name="subcate_id"]').append('<option value="'+ value.id +'">' + value.name + '</option>');
        });

        });
    });
});
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    function mainThamUrl(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
                $('#mainThmb').attr('src',e.target.result).width(130).height(150);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\POS\resources\views/product/ProductEdit.blade.php ENDPATH**/ ?>