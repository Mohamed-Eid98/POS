<?php $__env->startSection('title'); ?>
    عرض الطلبات
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
            الطلبات
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

                    <h4 class="card-title">عدد الطلبات الخاصه بالموزع</h4>
                    <p class="card-title-desc">

                    </p>

                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">



                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="example" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>

                                                <th data-priority="1">رقم الفاتوره</th>
                                                <th data-priority="2">الحاله</th>
                                                <th data-priority="3">سعر فاتوره التوصيل</th>
                                                <th data-priority="4"> select</th>

                                            </tr>

                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td></td>

                                                    <td><?php echo e($user->invoice_no); ?></td>
                                                    <td><?php echo e($user->status); ?></td>
                                                    <td><?php echo e($user->final_total); ?></td>
                                                    <td>
                                                        <label>
                                                            <input type="checkbox" name="item"
                                                                value="<?php echo e($user->final_total); ?>">اختار

                                                        </label>
                                                    </td>


                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                                        </tbody>
                                    </table>


                                    <div class="row">
                                        <div class="col-md-3 m-auto"><input type="text"></div>
                                        <p id="total">Total: $0</p>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 m-auto"><input type="date"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <input type="submit" class="btn btn-primary waves-effect waves-light" value="حفظ">
                </div>
                

            </div>
        </div>
    </div> <!-- end col -->
    </div>
<?php $__env->stopSection(); ?>

<script>
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const total = document.getElementById('total');

    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', () => {
            let sum = 0;

            checkboxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    sum += parseInt(checkbox.value);
                }
            });

            total.textContent = `Total: $${sum}`;
        });
    });
</script>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\POS\resources\views/customers/ordercustomer_view.blade.php ENDPATH**/ ?>