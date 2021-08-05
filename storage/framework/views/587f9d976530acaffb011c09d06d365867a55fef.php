<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        


    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        <?php echo e(trans('global.groupe.fields.niveau_id')); ?>


                    </th>

                            <td >
                                  <?php echo e($demande->stagaire->etudiant->niveau->liblle?? ''); ?>

                            </td>  
                </tr>
                <tr>
                    <th>
                                                    <?php echo e(trans('global.groupe.fields.groupe_tot')); ?>


                        </th>

                             <td >
                                  <?php echo e($demande->stagaire->groupe->name ?? ''); ?>

                            </td>
                </tr>
                <tr> 
                    <th>
                        <?php echo e(trans('global.demande.fields.stage')); ?>   
                    </th>
                    <td>
                    <?php echo e($demande->stage->name); ?>

                   </td>
                </tr>
                  <tr>
                            <th>
                                <?php echo e(trans('global.demande.fields.type')); ?>

                            </th>
                            <td>
                                <?php echo e($demande->type_dem); ?>

                           </td>
                  </tr>  
                <tr>       
                    <th>
                        <?php echo e(trans('global.demande.fields.objet')); ?>

                    </th>
                    <td>
                        <?php echo e($demande->objet_dem); ?>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\resources\views/stagaire/demandes/show.blade.php ENDPATH**/ ?>