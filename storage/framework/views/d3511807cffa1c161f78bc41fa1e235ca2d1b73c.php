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
<?php if(session('error')): ?>

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Erreur</strong>    <?php echo e(session('error')); ?>!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

<?php endif; ?>
<?php if(session('verify')): ?>

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Erreur</strong>    <?php echo e(session('verify')); ?>!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

<?php endif; ?>
<div class="card">
    <div class="card-header">
       
        <div class="form-group <?php echo e($errors->has('niveau_id') ? 'has-error' : ''); ?>">
            <label for="niveau_id"><?php echo e(trans('global.periode.fields.niveau_id')); ?></label>
            
            <select name="niveau_id" id="niveau_id" class="form-control select2-selection__choice" <?php if(Auth::user()->isAdmin()): ?>onchange="setAdmin(this.value);"<?php endif; ?> <?php if(Auth::user()->isSecretaire() || Auth::user()->isEncadrant()): ?>onchange="set(this.value);"<?php endif; ?> >
                <option selected>Choisir un niveau </option>
                <?php $__currentLoopData = $niveaux; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $niveau): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option id="niveau_id" value="<?php echo e($niveau->id); ?>">
                        <?php echo e($niveau->liblle); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <p class="helper-block"></p>
                <?php echo e(trans('global.repartition.fields.niveau_id_helper')); ?>

            </p>
            </select>
        </div>
    </div>

    <div class="card-body">
        <form action="<?php echo e(route("stagaire.notes.create")); ?>" method="GET" enctype="multipart/form-data">
            
            


            <div class="form-group">
                <label for="stage_id">Stages</label>
                <select name="stage_id" id="stage_id" class="form-control select2" >
 
                </select>
                <p class="helper-block">
                    <?php echo e(trans('global.repartition.fields.stage_helper')); ?>

                </p>
            </div>
            <div class="form-group">
                <label for="groupe_id">Groupes</label>
                <select name="groupe_id" id="groupe_id" class="form-control select2" >

                </select>
                <p class="helper-block">
                    <?php echo e(trans('global.repartition.fields.groupe_helper')); ?>

                </p>
            </div>
            <button class="btn btn btn-info float-right">
                suivant <span class="fas fa-arrow-right"></span>
        </button>
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
                    url:'stagaire/getinfo/'+niveau_id,
                    success:function(response){
                        var data=JSON.parse(response);
                        var periodes=data.periodes;
                        var stages=data.stages;
                        var groupes=data.groupes;
 
                        $('#stage_id').empty();
                        if(stages.length>0){
                        for(i=0;i<stages.length;i++){
                            if(stages[i].niveau_id==niveau_id){
                            var stage="<option value='"+stages[i].id+"'>"+stages[i].name+"</option>";
                                               $('#stage_id').append(stage);}
                        }         
                    }
                    $('#groupe_id').empty();
                        if(groupes.length>0){
                        for(i=0;i<groupes.length;i++){
                            var groupe="<option value='"+groupes[i].id+"'>"+groupes[i].name+"</option>";
                                               $('#groupe_id').append(groupe);
                        }         
                    }
                    }
                });
            }
        // });
        });

    }
    </script>
    <script type="text/javascript" >
        function setAdmin(id){
            var niveau_id=Number(id);
            $(document).ready(function(){
            // var id=Number($('#niveau_id').val());
            // $('#save').on('change',function(){
                // var niveau_id=$('#niveau_id').val();
    
                if (niveau_id) {
                    $.ajax({
                        url:'stagaire/getinfoAdmin/'+niveau_id,
                        success:function(response){
                            var data=JSON.parse(response);
                            var periodes=data.periodes;
                            var stages=data.stages;
                            var groupes=data.groupes;
    
                            $('#stage_id').empty();
                            if(stages.length>0){
                            for(i=0;i<stages.length;i++){
                                var stage="<option value='"+stages[i].id+"'>"+stages[i].name+"</option>";
                                                   $('#stage_id').append(stage);
                            }         
                        }
                        $('#groupe_id').empty();
                            if(groupes.length>0){
                            for(i=0;i<groupes.length;i++){
                                var groupe="<option value='"+groupes[i].id+"'>"+groupes[i].name+"</option>";
                                                   $('#groupe_id').append(groupe);
                            }         
                        }
                        }
                    });
                }
            // });
            });
    
        }
        </script>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\resources\views/stagaire/notes/ajax.blade.php ENDPATH**/ ?>