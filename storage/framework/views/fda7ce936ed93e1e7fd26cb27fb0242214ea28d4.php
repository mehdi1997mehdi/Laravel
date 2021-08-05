<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.show')); ?> <?php echo e(trans('global.periode.title')); ?>

    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                     Nom
                    </th>
                    <td>
                        <?php echo e($periode->name); ?>

                    </td>
                </tr>
                <tr>
                    <th>
                        <?php echo e(trans('global.periode.fields.date_debut')); ?>

                    </th>
                    <td>
                        <?php echo $periode->date_debut; ?>

                    </td>
                </tr>
                <tr>
                    <th>
                        <?php echo e(trans('global.periode.fields.date_fin')); ?>

                    </th>
                    <td>
                        <?php echo e($periode->date_fin); ?>

                    </td>
                </tr>
                <tr>
                    <th>
                        <?php echo e(trans('global.periode.fields.niveau_id')); ?>

                    </th>
                    <td>
                        <?php echo e($periode->niveau->liblle); ?>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\resources\views/admin/periodes/show.blade.php ENDPATH**/ ?>