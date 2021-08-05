<?php $__env->startSection('content'); ?>
<?php
 $user=Auth::user();
?>
<?php if(session('erreur1')): ?>
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
   <?php echo e(session('erreur1')); ?>

</div>
<?php endif; ?>
<?php if(session('erreur2')): ?>
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
   <?php echo e(session('erreur2')); ?>

</div>
<?php endif; ?>
<?php if(session('success')): ?>
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
   <?php echo e(session('success')); ?>

</div>
<?php endif; ?>
<div class="card">
	<div class="card-body" >
		<i class="badge badge-danger   float-right  mx-2">modifié le <?php echo e($user->updated_at); ?></i>
    <i class="badge badge-success float-right">crée le <?php echo e($user->created_at); ?></i>
    
    </div>
    <div  class="row">
    
    	<?php if($user->isEtudiant()): ?>  
    	<div class="col-md-4 offset-md-2">
    	  <hr>
    	<h4 class="pr-3 d-inline"><?php echo e($user->profile->etudiant->nom); ?> <?php echo e($user->profile->etudiant->prenom); ?></h4><span class="badge badge-primary">etudiant</span>
    	    <hr>
          </div>
           <div class="col-md-4">
         	 <hr>
         	  <h4><i class="fas fa-edit"></i>changer mot de passe</h4>
         	 <hr>
         	 <hr>
         <form action="<?php echo e(route("admin.users.updatep")); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
            	 <?php echo csrf_field(); ?>
                 <?php echo method_field('PUT'); ?>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-control">
                <?php if($errors->has('password')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('password')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.user.fields.password_helper')); ?>

                </p>
            </div>
            <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                <label for="password">Nouveau mot de passe</label>
                <input type="password" id="password" name="passwordn" class="form-control">
                <?php if($errors->has('password')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('password')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.user.fields.password_helper')); ?>

                </p>
            </div>
             <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                <label for="password">confirmé mot de passe</label>
                <input type="password" id="password" name="passwordc" class="form-control">
                <?php if($errors->has('password')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('password')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.user.fields.password_helper')); ?>

                </p>
                <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
            </div>
             <button class="btn btn-outline-info"><i class="fas fa-edit"> Modifier</i></button>
           </form>
            <hr>
         </div>
    	<?php elseif($user->isEncadrant()): ?> 
    	<div class="col-md-4 offset-md-2">
    	<hr>
        <h4 class="pr-3 d-inline"><?php echo e($user->profile->nom); ?> <?php echo e($user->profile->prenom); ?></h4><span class="badge badge-primary">encadrant</span>
<hr>
          </div>
           <div class="col-md-4">
         	 <hr>
         	  <h4><i class="fas fa-edit"></i>changer mot de passe</h4>
         	 <hr>
         	 <hr>
         <form action="<?php echo e(route("admin.users.updatep")); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
            	 <?php echo csrf_field(); ?>
                 <?php echo method_field('PUT'); ?>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-control">
                <?php if($errors->has('password')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('password')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.user.fields.password_helper')); ?>

                </p>
            </div>
            <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                <label for="password">Nouveau mot de passe</label>
                <input type="password" id="password" name="passwordn" class="form-control">
                <?php if($errors->has('password')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('password')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.user.fields.password_helper')); ?>

                </p>
            </div>
             <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                <label for="password">confirmé mot de passe</label>
                <input type="password" id="password" name="passwordc" class="form-control">
                <?php if($errors->has('password')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('password')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.user.fields.password_helper')); ?>

                </p>
                <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
            </div>
             <button class="btn btn-outline-info"><i class="fas fa-edit"> Modifier</i></button>
           </form>
            <hr>
         </div>
        <?php elseif($user->isSecretaire()): ?> 
        <div class="col-md-4 offset-md-2">
    	<hr>
        <h4 class="pr-3 d-inline"><?php echo e($user->profile->nom); ?> <?php echo e($user->profile->prenom); ?></h4><span class="badge badge-primary">secretaire</span>
         <hr>
          </div>
           <div class="col-md-4">
         	 <hr>
         	  <h4><i class="fas fa-edit"></i>changer mot de passe</h4>
         	 <hr>
         	 <hr>
         <form action="<?php echo e(route("admin.users.updatep")); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
            	 <?php echo csrf_field(); ?>
                 <?php echo method_field('PUT'); ?>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-control">
                <?php if($errors->has('password')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('password')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.user.fields.password_helper')); ?>

                </p>
            </div>
            <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                <label for="password">Nouveau mot de passe</label>
                <input type="password" id="password" name="passwordn" class="form-control">
                <?php if($errors->has('password')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('password')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.user.fields.password_helper')); ?>

                </p>
            </div>
             <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                <label for="password">confirmé mot de passe</label>
                <input type="password" id="password" name="passwordc" class="form-control">
                <?php if($errors->has('password')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('password')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.user.fields.password_helper')); ?>

                </p>
                <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
            </div>
             <button class="btn btn-outline-info"><i class="fas fa-edit"> Modifier</i></button>
           </form>
            <hr>
         </div>
        <?php elseif($user->isAdmin()): ?> 
        <div class="col-md-4 offset-md-2">
    	<hr>
        <h4 class="pr-3 d-inline"><?php echo e($user->profile->nom); ?> <?php echo e($user->profile->prenom); ?></h4><span class="badge badge-primary">Administrateur</span>
         <hr>
          </div>
           <div class="col-md-4">
         	 <hr>
         	  <h4><i class="fas fa-edit"></i>changer mot de passe</h4>
         	 <hr>
         	 <hr>
         <form action="<?php echo e(route("admin.users.updatep")); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
            	 <?php echo csrf_field(); ?>
                 <?php echo method_field('PUT'); ?>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-control">
                <?php if($errors->has('password')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('password')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.user.fields.password_helper')); ?>

                </p>
            </div>
            <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                <label for="password">Nouveau mot de passe</label>
                <input type="password" id="password" name="passwordn" class="form-control">
                <?php if($errors->has('password')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('password')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.user.fields.password_helper')); ?>

                </p>
            </div>
             <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                <label for="password">confirmé mot de passe</label>
                <input type="password" id="password" name="passwordc" class="form-control">
                <?php if($errors->has('password')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('password')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.user.fields.password_helper')); ?>

                </p>
                <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
            </div>
             <button class="btn btn-outline-info"><i class="fas fa-edit"> Modifier</i></button>
           </form>
            <hr>
         </div>
    	<?php endif; ?>
    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\resources\views/admin/users/updatepassword.blade.php ENDPATH**/ ?>