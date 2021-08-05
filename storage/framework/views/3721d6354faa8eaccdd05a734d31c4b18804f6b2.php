<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
       
    </div>

    <div class="card-body">
        <form action="<?php echo e(route("admin.services.store")); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            
            <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                <label for="name">Nom*</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo e(old('name', isset($service) ? $service->name : '')); ?>">
                <?php if($errors->has('name')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('name')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.service.fields.name_helper')); ?>

                </p>
            </div>
            
            <div class="form-group <?php echo e($errors->has('capacite') ? 'has-error' : ''); ?>">
                <label for="capacite"><?php echo e(trans('global.service.fields.capacite')); ?>*</label>
                <input type="number" id="capacite" name="capacite" class="form-control" value="<?php echo e(old('capacite', isset($service) ? $service->capacite : '')); ?>">
                <?php if($errors->has('capacite')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('capacite')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.service.fields.capacite_helper')); ?>

                </p>
            </div>
            
                        <div class="form-group <?php echo e($errors->has('lieu') ? 'has-error' : ''); ?>">
                <label for="lieu"><?php echo e(trans('global.service.fields.lieu')); ?>*</label>
                <input type="text" id="lieu" name="lieu" class="form-control" value="<?php echo e(old('lieu', isset($service) ? $service->lieu : '')); ?>">
                <?php if($errors->has('lieu')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('lieu')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.service.fields.lieu_helper')); ?>

                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="<?php echo e(trans('global.save')); ?>">
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\resources\views/admin/services/create.blade.php ENDPATH**/ ?>