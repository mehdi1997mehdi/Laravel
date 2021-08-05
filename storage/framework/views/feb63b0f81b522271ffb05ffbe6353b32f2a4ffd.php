<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                       Nom
                    </th>
                    <td>
                        <?php echo e($service->name); ?>

                    </td>
                </tr>
                <tr>
                    <th>
                        <?php echo e(trans('global.service.fields.capacite')); ?>

                    </th>
                    <td>
                        <?php echo e($service->capacite); ?>

                    </td>
                </tr>
                <tr>
                    <th>
                        <?php echo e(trans('global.service.fields.lieu')); ?>

                    </th>
                    <td>
                        <?php echo e($service->lieu); ?>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\resources\views/admin/services/show.blade.php ENDPATH**/ ?>