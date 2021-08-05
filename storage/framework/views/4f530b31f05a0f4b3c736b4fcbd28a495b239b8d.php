<?php $__env->startSection('content'); ?>
<?php
    
?>
<div class="card">
    <div class="card-header">
        
       <center class="title exc-title-primary">                <h3 class="text-uppercase text-info hide"><?php echo e($stage->name); ?></h3> </center>
      
    </div>

    <div class="card-body">
        <form action="<?php echo e(route("stagaire.notes.store")); ?>" method="POST" enctype="multipart/form-data" >
            <?php echo csrf_field(); ?>
            <input size="12" type="hidden" name="stage" value="<?php echo e($stage->id); ?>">
             
             <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                        <tr>
                            <th>
                                
                                Nom
                            </th>
                            <th>
                                
                                Prenom
                            </th>

                            <th >
                                
                                Présence
                                <em class="text-danger text-xs">*/3</em>
                            </th>
                            <th >
                                
                                Motivation
                                <em class="text-danger text-xs">*/3</em>

                            </th>
                            <th >
                                
                                Assiduité
                                <em class="text-danger text-xs">*/3</em>

                            </th>
                            <th >
                                
                                Intégration de l’équipe
                                <em class="text-danger text-xs">*/3</em>
                            </th>
                            <th >
                                
                                Evaluation des connaissances  
                                <em class="text-danger text-xs">*/8</em>
                            </th >
                            <th>
                                
                                Note
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $stagaires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stagaire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-entry-id="<?php echo e($stagaire->id); ?>">

                                <td>
                                    <?php echo e($stagaire->etudiant->nom ?? ''); ?>

                                </td>
                                <td>
                                    <?php echo e($stagaire->etudiant->prenom ?? ''); ?>

                                </td>                                    
                                    <input size="12" type="hidden" name="stagaire_id[]" value="<?php echo e($stagaire->id); ?>">
                                <td >
                                    
                                    <input size="12"class="form-control <?php echo e($errors->has('presences.*') ? 'is-invalid' : ''); ?>"  type="double" name="presences[<?php echo e($stagaire->id); ?>]" id="presences" value="<?php echo e($stagaire->stages->where('id',$stage->id)->first()->pivot->presence); ?>">
                                    

                                    <?php $__errorArgs = ['presences.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger text-xs" role="alert">
                                        <?php echo e($message); ?>

                                      </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </td>
                                <td >
                                    <input size="12" class="form-control <?php echo e($errors->has('motivations.*') ? 'is-invalid' : ''); ?>" type="double" name="motivations[<?php echo e($stagaire->id); ?>]" id="motivations" value="<?php echo e($stagaire->stages->where('id',$stage->id)->first()->pivot->motivation); ?>">
                               
                                    <?php $__errorArgs = ['motivations.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class=" text-danger text-xs" role="alert">
                                        <?php echo e($message); ?>

                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </td>
                                <td >
                                    <input size="12" class="form-control <?php echo e($errors->has('Assiduites.*') ? 'is-invalid' : ''); ?>" type="double" name="Assiduites[<?php echo e($stagaire->id); ?>]" id="Assiduites" value="<?php echo e($stagaire->stages->where('id',$stage->id)->first()->pivot->Assiduite); ?>">
                               
                                    <?php $__errorArgs = ['Assiduites.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger text-xs" role="alert">
                                        <?php echo e($message); ?>

                                      </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </td>
                                <td >
                                    <input size="12" class="form-control <?php echo e($errors->has('integrations.*') ? 'is-invalid' : ''); ?>" type="double" name="integrations[<?php echo e($stagaire->id); ?>]" id="integrations" value="<?php echo e($stagaire->stages->where('id',$stage->id)->first()->pivot->integration); ?>">
                                    <?php $__errorArgs = ['integrations.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger text-xs" role="alert">
                                        <?php echo e($message); ?>

                                      </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </td>
                                <td >
                                    <input size="12" class="form-control <?php echo e($errors->has('connaissances.*') ? 'is-invalid' : ''); ?>" type="double" name="connaissances[<?php echo e($stagaire->id); ?>]" id="connaissances" value="<?php echo e($stagaire->stages->where('id',$stage->id)->first()->pivot->connaissance); ?>">
                                    <?php $__errorArgs = ['connaissances.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger text-xs" role="alert">
                                        <?php echo e($message); ?>

                                      </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </td>
                                <td>
                                    <input size="10" disabled  type="double"  value="<?php echo e($stagaire->stages->where('id',$stage->id)->first()->pivot->note); ?>">

                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div>
                <input size="12" type="hidden" name="isEncadrant" value="<?php echo e(Auth::user()->isEncadrant()); ?>">
                <?php if(Auth::user()->isEncadrant()): ?>
                <input size="12" class="btn btn-danger" type="submit" value="Valider">

                <?php endif; ?>
                <?php if(!Auth::user()->isEncadrant()): ?>
                    <input size="12" class="btn btn-danger" type="submit" value="<?php echo e(trans('global.save')); ?>">

                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\resources\views/stagaire/notes/create.blade.php ENDPATH**/ ?>