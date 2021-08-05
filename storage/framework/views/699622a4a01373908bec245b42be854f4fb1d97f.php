<?php $__env->startSection('content'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php if(session('not')): ?>

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Succes</strong>    <?php echo e(session('not')); ?>!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

<?php endif; ?>
<div class="card">
    <div class="card-header">
       
    </div>

    <div class="card-body">
        <form action="<?php echo e(route("stagaire.affectation.store")); ?>" method="GET" enctype="multipart/form-data">
            
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
            <div class="form-group <?php echo e($errors->has('capacite') ? 'has-error' : ''); ?>">
                <label for="capacite">Nombre des Stagaires dans sous groupe<strong>(valeur par defaut:la capcité minimale du services d'accueils)</strong></label>
                <input type="number" id="capacite" name="capacite" class="form-control" value="<?php echo e(old('capacite', isset($groupe) ? $groupe->capacite : '')); ?>">
                <?php if($errors->has('capacite')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('capacite')); ?>

                    </em>
                <?php endif; ?>     

 
                <p class="helper-block text-danger">
                      
                 </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="<?php echo e(trans('global.save')); ?>">
           </div>
        </form>
    </div>
</div>


<script>
  


</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\resources\views/stagaire/affectation/index.blade.php ENDPATH**/ ?>