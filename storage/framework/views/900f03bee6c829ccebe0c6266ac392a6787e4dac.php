<?php $__env->startSection('content'); ?>
<?php
    $niveaux=App\Niveau::all();
?>
<div class="card">
    <div class="card-header">
       
        <div class="form-group <?php echo e($errors->has('niveau_id') ? 'has-error' : ''); ?>">
            <label for="niveau_id"><?php echo e(trans('global.periode.fields.niveau_id')); ?></label>
            
            <select name="niveau_id" id="niveau_id" class="form-control select2-selection__choice" onchange="set(this.value);">
                <option selected>Choisir un niveau</option>
                <?php $__currentLoopData = $niveaux; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $niveau): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option id="niveau_id" value="<?php echo e($niveau->id); ?>">
                        <?php echo e($niveau->liblle); ?>

                        
                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <p class="helper-block"></p>
                <?php echo e(trans('global.repartition.fields.niveau_id_helper')); ?>

            </p>
            </select>
            <?php if($errors->has('niveau_id')): ?>
            <em class="invalid-feedback">
                <?php echo e($errors->first('niveau_id')); ?>


            </em>
            <?php endif; ?>
        </div>
    </div>

    <div class="card-body">
        <form action="<?php echo e(route("stagaire.repartition.partitionner")); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            
            <div class="form-group ">
                <label for="periode_id">Periode</label>
                <select name="periode_id" id="periode_id" class="form-control select2" >
 
                </select>
                <p class="helper-block">
                    <?php echo e(trans('global.repartition.fields.periode_helper')); ?>

                </p>
            </div>
            <div class="form-group">
                <label for="stage_id">Stage</label>
                <select name="stage_id" id="stage_id" class="form-control select2" >
 
                </select>
                <p class="helper-block">
                    <?php echo e(trans('global.repartition.fields.stage_helper')); ?>

                </p>
            </div>
            <div class="form-group">
                <label for="groupes">Groupes
                    <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                <select name="groupes[]" id="groupes" class=" form-control select2" multiple="multiple">

                </select>
                <?php if($errors->has('groupes')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('groupes')); ?>

    
                </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.repartition.fields.groupe_helper')); ?>

                </p>
            </div>
            <input class="btn btn-danger" type="submit" value="<?php echo e(trans('global.save')); ?>">

        </div>
        </form>

    </div>
</div>

<?php $__env->stopSection(); ?>
<script type="text/javascript" >
    function set(id){
        var niveau_id=Number(id);
        $(document).ready(function(){
        // var id=Number($('#niveau_id').val());
        // $('#save').on('change',function(){
            // var niveau_id=$('#niveau_id').val();

            if (niveau_id) {
                $.ajax({
                    url:'stagaire/repartition/'+niveau_id,
                    success:function(response){
                        var data=JSON.parse(response);
                        var periodes=data.periodes;
                        var stages=data.stages;
                        var groupes=data.groupes;

                        $('#periode_id').empty();
                        if(periodes.length>0){
                            var periode="<option value='"+periodes[0].id+"'>"+periodes[0].name+"</option>";
                                               $('#periode_id').append(periode);
                    }
                        $('#stage_id').empty();
                        if(stages.length>0){
                        for(i=0;i<stages.length;i++){
                            var stage="<option value='"+stages[i].id+"'>"+stages[i].name+"</option>";
                                               $('#stage_id').append(stage);
                        }         
                    }
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
        // });
        });

    }
    </script>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\resources\views/stagaire/repartition/choix.blade.php ENDPATH**/ ?>