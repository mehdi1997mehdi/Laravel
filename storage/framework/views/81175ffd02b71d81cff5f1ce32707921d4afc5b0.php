<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        
    </div>
    <div class="card-body">

        <form action="<?php echo e(route("admin.groupes.store")); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

             <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                <label for="name">Nom*</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo e(old('name', isset($groupe) ? $groupe->name : '')); ?>">
                <?php if($errors->has('name')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('name')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.groupe.fields.name_helper')); ?>

                </p>
            </div>
            <div class="form-group <?php echo e($errors->has('niveau_id') ? 'has-error' : ''); ?>">
                <label for="niveau_id"><?php echo e(trans('global.groupe.fields.niveau_id')); ?>*</label>
                <select name="niveau_id" id="niveau_id" class="form-control select2" >
                    <?php $__currentLoopData = $niveaux; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $niveau): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($niveau->id); ?>">
                            <?php echo e($niveau->liblle); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('niveau_id')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('niveau_id')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.groupe.fields.niveau_id_helper')); ?>

                </p>
            </div>

           
            <div class="form-group <?php echo e($errors->has('groupe_tot') ? 'has-error' : ''); ?>">
                <label for="groupe_tot"><?php echo e(trans('global.groupe.fields.groupe_tot')); ?>*</label>
                <input type="number" id="groupe_tot" name="groupe_tot" class="form-control" value="<?php echo e(old('groupe_tot', isset($groupe) ? $groupe->groupe_tot : '')); ?>">
                <?php if($errors->has('groupe_tot')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('groupe_tot')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.groupe.fields.groupe_tot_helper')); ?>

                </p>
            </div>
            <div class="form-group <?php echo e($errors->has('groupe_sh') ? 'has-error' : ''); ?>">
                <label for="groupe_sh"><?php echo e(trans('global.groupe.fields.groupe_sh')); ?>*</label>
                <input type="number" id="groupe_sh" name="groupe_sh" class="form-control" value="<?php echo e(old('groupe_sh', isset($groupe) ? $groupe->groupe_sh : '')); ?>">
                <?php if($errors->has('groupe_sh')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('groupe_sh')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.groupe.fields.groupe_sh_helper')); ?>

                </p>
            </div>
            <div class="form-group <?php echo e($errors->has('groupe_sgh') ? 'has-error' : ''); ?>">
                <label for="groupe_sgh">Sous sous groupe*</label>
                <input type="number" id="groupe_sgh" name="groupe_sgh" class="form-control" value="<?php echo e(old('groupe_sgh', isset($groupe) ? $groupe->groupe_sgh : '')); ?>">
                <?php if($errors->has('groupe_sgh')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('groupe_sgh')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.groupe.fields.groupe_sgh_helper')); ?>

                </p>
            </div>
                <input class="btn btn-danger" type="submit" value="<?php echo e(trans('global.save')); ?>">
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\resources\views/admin/groupes/create.blade.php ENDPATH**/ ?>