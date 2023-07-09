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

    <?php if(session('add')): ?>
        <div class="alert alert-success">
            <?php echo e(session('add')); ?>

        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title"> الاشعار</h4>
                    <p class="card-title-desc">
                    </p>



                    <form action="<?php echo e(route('fcmToken')); ?>" class="dropzone" method="POST">
                        <?php echo csrf_field(); ?>



                        <div class="text-center mt-4">
                            <input type="submit" class="btn btn-primary waves-effect waves-light" value="حفظ">
                        </div>
                    </form>


                    <form action="<?php echo e(route('notification')); ?>" class="dropzone" method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body">


                                        <div class="box">
                                            <div class="box-header with-border">
                                                <h4 class="box-title">إضافة اشعار</h4>
                                            </div>
                                            <hr>
                                            <!-- start 2nd row  -->

                                            <div class="mb-3">
                                                <div class="form-group">
                                                    <h2> نوع الاشعار<span class="text-danger">*</span></h2>
                                                    <div class="controls">
                                                        <select name="title" id="select" class="form-control">


                                                            <option value="Notice">تهنئه</option>
                                                            <option value="Product">تنبيه</option>
                                                            <option value="Info">معلومه</option>


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


                                            <div class="form-group my-5">
                                                <h4 for="name"> الاشعار<span class="text-danger">*</span>
                                                </h4>
                                                <div class="controls">
                                                    <textarea id="name" name="message" class="form-control" cols="10" rows="5"></textarea>
                                                    <?php $__errorArgs = ['body'];
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


                        <div class="text-center mt-4">
                            <input type="submit" class="btn btn-primary waves-effect waves-light" value="حفظ">
                        </div>
                    </form>






                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
<?php $__env->stopSection(); ?>










<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
    https://firebase.google.com/docs/web/setup#available-libraries -->

<script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyA095Hq0lPUdv82dl35lgbaaND3Lv_fnYM",
        authDomain: "benesize-6cd49.firebaseapp.com",
        projectId: "benesize-6cd49",
        storageBucket: "benesize-6cd49.appspot.com",
        messagingSenderId: "773189169408",
        appId: "1:773189169408:web:35ba4eb8dcdf0211d443e5",
        measurementId: "G-882GB7XM5S"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    const messaging = firebase.messaging();

    function initFirebaseMessagingRegistration() {
        messaging.requestPermission().then(function () {
            return messaging.getToken()
        }).then(function(token) {

            axios.post("<?php echo e(route('fcmToken')); ?>",{
                _method:"PATCH",
                token
            }).then(({data})=>{
                console.log(data)
            }).catch(({response:{data}})=>{
                console.error(data)
            })

        }).catch(function (err) {
            console.log(`Token Error :: ${err}`);
        });
    }

    initFirebaseMessagingRegistration();

    messaging.onMessage(function({data:{body,title}}){
        new Notification(title, {body});
    });
</script>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\test\Downloads\New folder\POS\resources\views/notification/notificationAdd.blade.php ENDPATH**/ ?>