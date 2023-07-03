<!-- JAVASCRIPT -->
<script src="<?php echo e(asset('build/libs/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('build/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('build/libs/metismenu/metisMenu.min.js')); ?>"></script>
<script src="<?php echo e(asset('build/libs/simplebar/simplebar.min.js')); ?>"></script>
<script src="<?php echo e(asset('build/libs/node-waves/waves.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/js/responsive.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/js/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/js/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/js/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/js/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/js/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/js/buttons.colVis.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')); ?>"></script>
<!--Internal  Datatable js -->
<script src="<?php echo e(asset('assets/js/table-data.js')); ?>"></script>



<script>
    < script >
        $('#change-password').on('submit', function(event) {
            event.preventDefault();
            var Id = $('#data_id').val();
            var current_password = $('#current-password').val();
            var password = $('#password').val();
            var password_confirm = $('#password-confirm').val();
            $('#current_passwordError').text('');
            $('#passwordError').text('');
            $('#password_confirmError').text('');
            $.ajax({
                url: "<?php echo e(url('update-password')); ?>" + "/" + Id,
                type: "POST",
                data: {
                    "current_password": current_password,
                    "password": password,
                    "password_confirmation": password_confirm,
                    "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function(response) {
                    $('#current_passwordError').text('');
                    $('#passwordError').text('');
                    $('#password_confirmError').text('');
                    if (response.isSuccess == false) {
                        $('#current_passwordError').text(response.Message);
                    } else if (response.isSuccess == true) {
                        setTimeout(function() {
                            window.location.href = "<?php echo e(route('root')); ?>";
                        }, 1000);
                    }
                },
                error: function(response) {
                    $('#current_passwordError').text(response.responseJSON.errors.current_password);
                    $('#passwordError').text(response.responseJSON.errors.password);
                    $('#password_confirmError').text(response.responseJSON.errors
                        .password_confirmation);
                }
            });
        });
</script>



<?php echo $__env->yieldContent('script'); ?>

<!-- App js -->
<script src="<?php echo e(asset('build/js/app.js')); ?>"></script>

<script>
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const totalInput = document.getElementById('total');

function updateTotal() {
  let sum = 0;

  checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                const value = parseInt(checkbox.value);
                if (typeof value === 'number' && !isNaN(value)) {
                sum += value;
                }
            }
            });

  totalInput.value = sum;
}

checkboxes.forEach((checkbox) => {
  checkbox.addEventListener('change', updateTotal);
});

updateTotal();
</script>

<?php echo $__env->yieldContent('script-bottom'); ?>

<?php /**PATH C:\Users\test\Desktop\New folder (2)\POS\resources\views/layouts/vendor-scripts.blade.php ENDPATH**/ ?>