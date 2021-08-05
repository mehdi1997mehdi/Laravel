<?php $__env->startSection('content'); ?>
<?php
    $niveaux=App\Niveau::all();
?>
<?php if(session('succes')): ?>

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Succes</strong>    <?php echo e(session('succes')); ?>!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

<?php endif; ?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong >   Affichage de la liste des stagaires par  groupe ou plusieurs groupes </strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<div class="card">
    <div class="card-header">

          <div style="margin-bottom: 10px;" class="row float-right">
            <div class="col-lg-12">
                <a class="btn btn-success" href="<?php echo e(route("stagaire.affectation.index")); ?>">
                      Regrouper
                </a>
            </div>
        </div>
    
    <div class="card-body">
        <form action="<?php echo e(route('stagaire.affectation.afficher')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
        <div class="form-group <?php echo e($errors->has('niveau_id') ? 'has-error' : ''); ?>">
            <label for="niveau_id"><?php echo e(trans('global.periode.fields.niveau_id')); ?></label>
            
            <select name="niveau_id" id="niveau_id" class="form-control select2-selection__choice" onchange="set(this.value);" >
                <option > Choisir un niveau </option>
                <?php $__currentLoopData = $niveaux; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $niveau): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option id="niveau_id" value="<?php echo e($niveau->id); ?>">
                        <?php echo e($niveau->liblle); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <p class="helper-block">
                <?php echo e(trans('global.repartition.fields.niveau_id_helper')); ?>

            </p>
            </select>
        </div>
    </div>

    <div class="card-body">
        <form action="<?php echo e(route('stagaire.affectation.afficher')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group"  <?php echo e($errors->has('groupes') ? 'has-error' : ''); ?>>
                <label for="groupes">Groupe*
                    <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                <select name="groupes[]" id="groupes" class="form-control select2" multiple="multiple">
                </select>
                <p class="helper-block">
                    <?php echo e(trans('global.repartition.fields.groupe_helper')); ?>

                </p>
            </div> 
                   <button class="btn btn btn-info float-right">
                           suivant <span class="fas fa-arrow-right"></span>
                   </button>
        </form>

    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<script type="text/javascript" >
    function set(id){
        var niveau_id=Number(id);
        $(document).ready(function(){
            if (niveau_id) {
                console.log(niveau_id);
                $.ajax({
                    url:'stagaire/affecter/'+niveau_id,
                    success:function(response){

                        var data=JSON.parse(response);
                        var groupes=data.groupes;
                        console.log(groupes);
                    $('#groupes').empty();
                        if(groupes.length>0){
                        for(i=0;i<groupes.length;i++){
                            var groupe="<option value='"+groupes[i].id+"'>"+groupes[i].name+"</option>";
                                               $('#groupes').append(groupe);
                        }         
                    }
                    }
                });
            }
        });

    }
    </script>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\resources\views/stagaire/affectation/choix.blade.php ENDPATH**/ ?>