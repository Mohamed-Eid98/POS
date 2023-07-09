<?php $__env->startSection('title'); ?>
    عرض العملاء
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    
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
            العملاء
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

                    <h4 class="card-title">عرض العملاء</h4>
                    <p class="card-title-desc">

                    </p>

                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">


                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example" class="table table-striped my-3 w-100" role="grid"
                                    aria-describedby="datatable_info" style="width: 1566px;">
                                    <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>رقم الهاتف</th>
                                            <th>رقم المحفظه </th>
                                            <th> عدد الطلبات</th>

                                            <th>المحافظه </th>
                                            

                                            <th>التعديلات</th>
                                        </tr>

                                    </thead>


                                    <?php

                                    ?>
                                    <tbody>

                                        <?php $i = 0; ?>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $i++; ?>
                                            <tr>
                                                <td><?php echo e($i); ?></td>
                                                <td><?php echo e($user->name); ?></td>
                                                <td><?php echo e($user->phone); ?></td>
                                                <td>
                                                    <?php if($user->seller): ?>
                                                    <?php echo e($user->seller->wallet_number); ?>

                                                    <?php else: ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($user->orders): ?>
                                                    <?php echo e($user->orders->count()); ?>

                                                    <?php else: ?>
                                                                    0
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($user->city): ?>
                                                    <?php echo e($user->city->general_title); ?>

                                                    <?php else: ?>
                                                                    لا يوجد
                                                    <?php endif; ?>
                                                </td>

                                                



                                                <td>
                                                    


                                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="عرض الزبائن">
                                                            <a href="<?php echo e(route('customers.show', $user->id)); ?>"
                                                                class="btn btn-sm btn-soft-primary"><i
                                                                    class="mdi mdi-eye-outline"></i></a>
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="عرض الطلبات">
                                                            <a href="<?php echo e(route('usersorder.show', $user->id)); ?>"
                                                                class="btn btn-sm btn-soft-info"><i
                                                                    class="fas fa-list-ul"></i></a>

                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                            <a href="<?php echo e(route('user.delete', $user->id)); ?>" title="حذف"
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\test\Downloads\New folder\POS\resources\views/customers/users_view.blade.php ENDPATH**/ ?>