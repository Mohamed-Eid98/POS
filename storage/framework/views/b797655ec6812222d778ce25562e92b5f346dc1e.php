
<?php $__env->startSection('title'); ?>
    عرض جميع الطلبات
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-header'); ?>
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">عرض </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    جميع الطلبات</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php if(session('delete')): ?>
        <div class="alert alert-success">
            <?php echo e(session('delete')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('edit')): ?>
        <div class="alert alert-info">
            <?php echo e(session('edit')); ?>

        </div>
    <?php endif; ?>


    <div class="col-xl-12">
        <div class="card ">
            <h4 class="card-title">عرض جميع الطلبات</h4>





            <div class="card-header pb-0">
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped my-3" style="width: 100%">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">#SL</th>
                            <th class="border-bottom-0">الطلبات</th>
                            <th class="border-bottom-0">التاريخ</th>
                            <th class="border-bottom-0">اسم العميل</th>
                            <th class="border-bottom-0">الحاله</th>
                            <th class="border-bottom-0">الكل</th>
                            <th class="border-bottom-0">طالبات الحاله</th>

                            <th class="border-bottom-0"> حدث</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $i++; ?>

                            <tr>
                                <td><?php echo e($i); ?></td>
                                <td> <a href=""> <?php echo e($order->invoice_no); ?> </a> </td>
                                <td><?php echo e($order->created_at->diffForHumans()); ?> </td>
                                <td>
                                    <?php if($order->customer): ?>
                                        <?php echo e($order->customer->name); ?>

                                    <?php else: ?>
                                        No name exist
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($order->status == 'Paid'): ?>
                                        <span class="badge rounded-pill text-bg-danger"> مدفوع </span>
                                    <?php else: ?>
                                        <span class="badge rounded-pill text-bg-primary"> غير
                                            مدفوع </span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($order->final_total); ?>EG </td>

                                <td>
                                    <?php if($order->status == 'Pending'): ?>
                                        <span class="badge rounded-pill text-bg-secondary"> معلق </span>
                                    <?php elseif($order->status == 'Paid'): ?>
                                        <span class="badge rounded-pill text-bg-primary"> تم الدفع  </span>
                                    <?php elseif($order->status == 'InPrograss'): ?>
                                        <span class="badge rounded-pill text-bg-warning">  قيد المراجعه </span>
                                    <?php elseif($order->status == 'Rejected'): ?>
                                        <span class="badge rounded-pill text-bg-danger"> تم الرفض </span>
                                    <?php elseif($order->status == 'Cancelled'): ?>
                                        <span class="badge rounded-pill text-bg-success"> تم الإلغاء </span>
                                    <?php elseif($order->status == 'Delivered'): ?>
                                        <span class="badge rounded-pill text-bg-info"> تم التوصيل </span>
                                    <?php else: ?>
                                        <span class="badge rounded-pill text-bg-success"> تم التسليم </span>
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <a href="<?php echo e(route('orders.paid', $order->id)); ?>" title="Product Details Data"
                                        class="btn btn-sm btn-soft-primary"><i class="mdi mdi-eye-outline"></i></a>
                                    <?php if($order->status == 'Paid'): ?>
                                        <a href="<?php echo e(route('orders.unpaid', $order->id)); ?>"
                                            class="btn btn-sm btn-soft-danger" title=" غير مدفوع"><i
                                                class="fa fa-arrow-up"></i>
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('orders.paid', $order->id)); ?>" class="btn btn-sm btn-soft-info"
                                            title="ادفع الان"><i class="fa fa-arrow-up"></i> </a>
                                    <?php endif; ?>

                                    
                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>




<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <!-- Internal Data tables -->
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')); ?>"></script>
    <!--Internal  Datatable js -->
    <script src="<?php echo e(URL::asset('assets/js/table-data.js')); ?>"></script>
    <script>
        $('#exampleModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var section_name = button.data('section_name')
            var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #section_name').val(section_name);
            modal.find('.modal-body #description').val(description);
        })
    </script>
    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var section_name = button.data('section_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #section_name').val(section_name);
        })
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\test\Downloads\New folder\POS\resources\views/orders/allorders.blade.php ENDPATH**/ ?>