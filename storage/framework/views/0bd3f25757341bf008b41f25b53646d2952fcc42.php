<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.create')); ?> <?php echo e(trans('global.demande.title_singular')); ?>

    </div>

    <div class="card-body">
        <form action="<?php echo e(route("stagaire.demandes.update", [$demande->id])); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            
            
            <div class="form-group <?php echo e($errors->has('stages') ? 'has-error' : ''); ?>">
                <label for="stage"><?php echo e(trans('global.stage.title')); ?>*</label>
                <select name="id_stage" id="stage" class="form-control  select2-selection __choice" >
                    <?php $__currentLoopData = $stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($stage->id); ?>" >
                           <?php echo e($stage->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('stages')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('stages')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.note.fields.note_helper')); ?>

                </p>
            </div>
            
             

             <div class="form-group <?php echo e($errors->has('type_dem') ? 'has-error' : ''); ?>">
                <label for="type_dem"><?php echo e(trans('global.demande.fields.type')); ?>*</label>
                <select name="type_dem" id="type_dem" class="form-control  select2-selection __choice" value="<?php echo e(old('type_dem', isset($demande) ? $demande->type_dem : '')); ?>">
                    <option value="Transfert" <?php if($demande->type_dem=="transfert"): ?>selected <?php endif; ?>><?php echo e(trans('global.demande.type_d.transfert')); ?></option>
                    <option value="Revalidation" <?php if($demande->type_dem=="Revalidation"): ?>selected <?php endif; ?>><?php echo e(trans('global.demande.type_d.revalidation')); ?></option>
                    <option value="Reclamtion" <?php if($demande->type_dem=="Reclamtion"): ?>selected <?php endif; ?>><?php echo e(trans('global.demande.type_d.reclamation')); ?></option>
                     <option value="Attestation" <?php if($demande->type_dem=="Attestation"): ?>selected <?php endif; ?>><?php echo e(trans('global.demande.type_d.attestation')); ?></option>

                </select>
                <?php if($errors->has('type_dem')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('type_dem')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.demande.fields.type_helper')); ?>

                </p>
            </div>

             

            <div class="form-group <?php echo e($errors->has('objet_dem') ? 'has-error' : ''); ?>">
                <label for="objet"><?php echo e(trans('global.demande.fields.objet')); ?>*</label>
                <textarea type="text" id="objet" name="objet_dem" class="form-control">
                    <?php echo e(old('objet_dem', isset($demande) ? $demande->objet_dem : '')); ?>

                </textarea>
                <?php if($errors->has('objet_dem')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('objet_dem')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.demande.fields.objet_helper')); ?>

                </p>
            
                      <input type="hidden" name="id_stagaire" value="<?php echo e(Auth::user()->profile->id); ?>">
            <div>
                <input class="btn btn-danger" type="submit" value="<?php echo e(trans('global.save')); ?>">
            </div>


        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\resources\views/stagaire/demandes/edit.blade.php ENDPATH**/ ?>