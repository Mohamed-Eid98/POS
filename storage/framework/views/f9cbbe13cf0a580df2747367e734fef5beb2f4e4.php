

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



                    <form action="<?php echo e(route('send.web-notification')); ?>" class="dropzone" method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <button onclick="startFCM()" class="btn btn-danger btn-flat">Allow notification
                                        </button>

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
                                                    <textarea id="name" name="body" class="form-control" cols="10" rows="5"></textarea>
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





<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Dashboard')); ?></div>

                    <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>

                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <button onclick="startFCM()" class="btn btn-danger btn-flat">Allow notification
                                    </button>
                                    <div class="card mt-3">
                                        <div class="card-body">
                                            <?php if(session('status')): ?>
                                                <div class="alert alert-success" role="alert">
                                                    <?php echo e(session('status')); ?>

                                                </div>
                                            <?php endif; ?>
                                            <form action="<?php echo e(route('send.web-notification')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <div class="form-group">
                                                    <label>Message Title</label>
                                                    <input type="text" class="form-control" name="title">
                                                </div>
                                                <div class="form-group">
                                                    <label>Message Body</label>
                                                    <textarea class="form-control" name="body"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-success btn-block">Send
                                                    Notification</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- The core Firebase JS SDK is always required and must be listed first -->
    

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
    <script>
        $serverKey =
            'AAAAtAWqcQA:APA91bGJP2o_RGYHrxqtTj0CsFNjO6QKU33gQUXMn69fvjwzhRzjrJ1wPw8SMKF0GBG_mfz91W56f5jpOR5M96kX40il4HLlcfdaeaax-on353WYA1bzykq5rTAhizyiLC5yRsGUH6Jj';
        var firebaseConfig = {
            apiKey: "AIzaSyA095Hq0lPUdv82dl35lgbaaND3Lv_fnYM",
            authDomain: "benesize-6cd49.firebaseapp.com",
            projectId: "benesize-6cd49",
            storageBucket: "benesize-6cd49.appspot.com",
            messagingSenderId: "773189169408",
            appId: "1:773189169408:web:35ba4eb8dcdf0211d443e5",
            measurementId: "G-882GB7XM5S"
        };
        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();

        function startFCM() {
            messaging
                .requestPermission()
                .then(function() {
                    return messaging.getToken()
                })
                .then(function(response) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '<?php echo e(route('store.token')); ?>',
                        type: 'POST',
                        data: {
                            token: response
                        },
                        dataType: 'JSON',
                        success: function(response) {
                            alert('Token stored.');
                        },
                        error: function(error) {
                            alert(error);
                        },
                    });
                }).catch(function(error) {
                    alert(error);
                });
        }
        messaging.onMessage(function(payload) {
            const title = payload.notification.title;
            const options = {
                body: payload.notification.body,
                icon: payload.notification.icon,
            };
            new Notification(title, options);
        });
    </script>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\test\Downloads\New folder\POS\resources\views/notification/notificationAdd.blade.php ENDPATH**/ ?>