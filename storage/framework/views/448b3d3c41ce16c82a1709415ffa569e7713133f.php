<?php $__env->startSection('title'); ?>
    عرض الطلبات
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    
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
                                <div class="" data-pattern="priority-columns">
                                    <form action="<?php echo e(route('orders.payments')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <table id="example" class="table table-striped w-100">
                                            <thead>
                                                <tr>
                                                    <th></th>

                                                    <th data-priority="1">رقم الفاتوره</th>
                                                    <th data-priority="2">الحاله</th>
                                                    <th data-priority="3">سعر فاتوره التوصيل</th>
                                                    <th data-priority="4"> اختيار</th>

                                                </tr>

                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td></td>

                                                        <td><?php echo e($order->invoice_no); ?> </td>
                                                        <td><?php echo e($order->status); ?> </td>
                                                        <td><?php echo e($order->final_total); ?></td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" name="name[<?php echo e($order->id); ?>]"
                                                                    value="<?php echo e($order->final_total); ?>">
                                                            </label>
                                                        </td>


                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                                            </tbody>
                                        </table>


                                        <?php if(!$orders->isEmpty()): ?>


                                        <div class="row">
                                            <div class="col-md-6 m-auto">


                                                <div class="row">
                                                    <input type="text" id="total" name="total" readonly
                                                        class="form-control form-control-rounded is-valid form-control-lg my-3 ">
                                                    <div class="col-md-4  m-auto"><input type="date" name="date_at"
                                                            value="<?php echo e(now()); ?>"
                                                            class="form-control form-control-rounded form-control-lg ">
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center
                                                            mt-4 mb-2">
                    <input type="submit" class="btn btn-primary waves-effect waves-light" value="حفظ">
                </div>
                </form>

            </div>
        </div>
    </div> <!-- end col -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
<script>
    $(function(e) {
        //file export datatable
        var table = $('#example').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdff', 'colvis'],
            responsive: true,
            language: {
                searchPlaceholder: 'البحث ...',
                sSearch: '',
                lengthMenu: '_MENU_ ',
            }
        });
        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');

        $('#example1').DataTable({
            language: {
                searchPlaceholder: 'البحث ...',
                sSearch: '',
                lengthMenu: '_MENU_',
            }
        });
        $('#example2').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'البحث ...',
                sSearch: '',
                lengthMenu: '_MENU_',
            }
        });
        var table = $('#example-delete').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'البحث ...',
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
                searchPlaceholder: 'البحث ...',
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\test\Downloads\New folder\POS\resources\views/customers/ordercustomer_view.blade.php ENDPATH**/ ?>