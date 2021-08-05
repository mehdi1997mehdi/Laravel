<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.show')); ?> <?php echo e(trans('global.groupe.title')); ?>

    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Nom
                    </th>
                    <td>
                        <?php echo e($groupe->name); ?>

                    </td>
                </tr>

                <tr>
                    <th>
                            <?php echo e(trans('global.groupe.fields.groupe_tot')); ?>

                    </th>
                    <td>
                        <?php echo e($groupe->groupe_tot); ?>

                    </td>
                </tr>
                <tr>
                    <th>
                            <?php echo e(trans('global.groupe.fields.groupe_sh')); ?>

                    </th>
                    <td>
                        <?php echo e($groupe->groupe_sh); ?>

                    </td>
                </tr>
                <tr>
                    <th>
                        Sous sous groupe   
                    </th>
                    <td>
                        <?php echo e($groupe->groupe_sgh); ?>

                    </td>
                </tr>
                <tr>
                    <th>
                            
                            Niveau
                    </th>
                    <td>
                        <?php echo e($groupe->niveau->liblle); ?>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\resources\views/admin/groupes/show.blade.php ENDPATH**/ ?>