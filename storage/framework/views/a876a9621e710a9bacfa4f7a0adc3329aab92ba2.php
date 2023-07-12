<?php $__env->startSection('title'); ?>
    عرض المناطق
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    <link
        href="<?php echo e(asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css')); ?>" />
    <link
        href="<?php echo e(asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css')); ?>" />


    <!-- Responsive datatable examples -->
    <link href="<?php echo e(asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet"
        type="text/css" />


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            عرض
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            الموظفين
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>


    <?php if(session('delete')): ?>
        <div class="alert alert-success">
            <?php echo e(session('delete')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('edit')): ?>
        <div class="alert alert-success">
            <?php echo e(session('edit')); ?>

        </div>
    <?php endif; ?>






    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">عرض الكوبونات</h4>
                    <p class="card-title-desc">

                    </p>

                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">


                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example" class="table table-striped my-3 w-100" role="grid"
                                    aria-describedby="datatable_info">
                                    <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>الكود</th>
                                            <th>نوع الخفيض</th>
                                            <th>التخفيض</th>
                                            <th>الحد الادني للشراء</th>
                                            <th>الحد الاقصي للشراء</th>
                                            <th>عدد مرات استخدام الكوبون</th>
                                            <th> حد استخدام لمستخدم واحد</th>
                                            <th> نشط</th>
                                            <th>ناريخ الانتهاء</th>
                                            <th> التعديلات</th>
                                        </tr>

                                    </thead>
                                    <tbody>


                        <?php $i = 0; ?>
                        <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $i++; ?>
                                        <tr>
                                            <td><?php echo e($i); ?></td>
                                            <td><?php echo e($coupon->name); ?></td>
                                            <td><?php echo e($coupon->code); ?></td>

                                            <td><?php echo e($coupon->type_discount); ?></td>
                                            <td><?php echo e($coupon->discount); ?></td>
                                            <td><?php echo e($coupon->min_price); ?></td>
                                            <td><?php echo e($coupon->max_price); ?></td>

                                            <td><?php echo e($coupon->limit); ?></td>
                                            <td><?php echo e($coupon->limit_user); ?></td>
                                            <td> <a href="">
                                                <input type="checkbox" id="switch<?php echo e($coupon->id); ?>" data-coupon-id="<?php echo e($coupon->id); ?>" switch="info" data-url="<?php echo e(route('coupon.updateStatus', $coupon->id)); ?>" <?php echo e($coupon->is_active ? 'checked' : ''); ?>>
                                                <label for="switch<?php echo e($coupon->id); ?>" data-on-label="نعم" data-off-label="لا"></label></a>
                                            </td>
                                            <td><?php echo e($coupon->end_date); ?></td>
                                            <td>
                                                <ul class="list-unstyled hstack gap-1 mb-0">
                                                    

                                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="حذف">
                                                        <a href="<?php echo e(route('coupon.delete' , $coupon->id)); ?>" title="حذف"
                                                            class="btn btn-sm btn-soft-danger"><i
                                                                class="mdi mdi-delete-outline"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    <?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>




<script>
    $(function() {
        $('input[type=checkbox][switch=info]').change(function() {
            var checkbox = $(this);
            var url = checkbox.data('url');
            var is_active = checkbox.prop('checked');

            // Get the CSRF token
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Send a PATCH request to update the is_active status
            $.ajax({
                url: url,
                type: "PATCH",
                data: {
                    is_active: is_active ? 1 : 0,
                },
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                },
                success: function(data) {
                    console.log(data);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>


    <script>
        $(function(e) {
            //file export datatable
            var table = $('#example').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis'],
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ ',
                }
            });
            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');

            $('#example1').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_',
                }
            });
            $('#example2').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_',
                }
            });
            var table = $('#example-delete').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_',
                }
            });
            $('#example-delete tbody').on('click', 'tr', function() {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });

            $('#button').click(function() {
                table.row('.selected').remove().draw(false);
            });

            //Details display datatable
            $('#example-1').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_',
                },
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function(row) {
                                var data = row.data();
                                return 'Details for ' + data[0] + ' ' + data[1];
                            }
                        }),
                        renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                            tableClass: 'table border mb-0'
                        })
                    }
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\test\Downloads\New folder\POS\resources\views/coupon/showcoupon.blade.php ENDPATH**/ ?>