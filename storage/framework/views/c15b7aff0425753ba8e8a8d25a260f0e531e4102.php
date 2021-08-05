<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
       
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            <?php echo e(trans('global.note.fields.stage')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('global.note.fields.note')); ?>

                        </th>
                        <th>
                            Fiche de validation
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $user->profile->stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-entry-id="<?php echo e($stage->id); ?>">
                            <td>

                            </td>
                            <td>
                                <?php echo e($stage->name ?? ''); ?>

                            </td>
                            <td>
                            <?php if($stage->pivot->verify): ?>
                            <?php echo e($stage->pivot->note); ?>


                                <?php endif; ?>
                            </td>
                            <td width="15" class="text-center">
                                <?php if($stage->pivot->verify && $stage->pivot->note>=10): ?>
                                                                    <em class="btn btn-light"><a href="<?php echo e(route('stagaire.attestation.print',$stage->id)); ?>"><i class="fa fa-download" aria-hidden="false"></i></a></em>

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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\resources\views/stagaire/notes/index.blade.php ENDPATH**/ ?>