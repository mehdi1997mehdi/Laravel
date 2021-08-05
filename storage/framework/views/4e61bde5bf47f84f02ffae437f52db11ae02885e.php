<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.create')); ?> <?php echo e(trans('global.periode.title_singular')); ?>

    </div>

    <div class="card-body">
        <form action="<?php echo e(route("admin.periodes.store")); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                <label for="name">Nom*</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo e(old('name', isset($periode) ? $periode->name : '')); ?>">
                <?php if($errors->has('name')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('name')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.periode.fields.name_helper')); ?>

                </p>
            </div>
            
            <div class="form-group <?php echo e($errors->has('niveau_id') ? 'has-error' : ''); ?>">
                <label for="niveau_id"><?php echo e(trans('global.periode.fields.niveau_id')); ?>*</label>
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
                    <?php echo e(trans('global.periode.fields.niveau_id_helper')); ?>

                </p>
            </div>

            <div class="form-group <?php echo e($errors->has('date_debut') ? 'has-error' : ''); ?>">
                <label for="date_debut"><?php echo e(trans('global.periode.fields.date_debut')); ?></label>
                <input type="date" id="date_debut" name="date_debut" class="form-control" value="<?php echo e(old('date_debut', isset($periode) ? $periode->date_debut : '')); ?>" step="0.01">
                <?php if($errors->has('date_debut')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('date_debut')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.periode.fields.date_debut_helper')); ?>

                </p>
            </div>

            <div class="form-group <?php echo e($errors->has('date_fin') ? 'has-error' : ''); ?>">
                <label for="date_fin"><?php echo e(trans('global.periode.fields.date_fin')); ?></label>
                <input type="date" id="date_fin" name="date_fin" class="form-control" value="<?php echo e(old('date_fin', isset($periode) ? $periode->date_fin : '')); ?>" step="0.01">
                <?php if($errors->has('date_fin')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('date_fin')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.periode.fields.date_fin_helper')); ?>

                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="<?php echo e(trans('global.save')); ?>">
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\resources\views/admin/periodes/create.blade.php ENDPATH**/ ?>