<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        
    </div>

    <div class="card-body">
        <form action="<?php echo e(route("admin.users.store")); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group <?php echo e($errors->has('nom') ? 'has-error' : ''); ?>">
                <label for="nom">Nom*</label>
                <input type="text" id="nom" name="nom" class="form-control" >
                <?php if($errors->has('nom')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('nom')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.user.fields.name_helper')); ?>

                </p>
            </div>
            
            <div class="form-group <?php echo e($errors->has('prenom') ? 'has-error' : ''); ?>">
                <label for="prenom">Prenom*</label>
                <input type="text" id="prenom" name="prenom" class="form-control">
                <?php if($errors->has('prenom')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('prenom')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.user.fields.lastname_helper')); ?>

                </p>
            </div>
            
            
     <div class="form-group <?php echo e($errors->has('service_id') ? 'has-error' : ''); ?>">
                <label for="service_id"><?php echo e(trans('global.stage.fields.services')); ?>*</label>
                <select name="service_id" id="service_id" class="form-control select2" >
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($service->id); ?>">
                            <?php echo e($service->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <p class="helper-block">
                    <?php echo e(trans('global.stage.fields.services_helper')); ?>

                </p>
            
            <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                <label for="email"><?php echo e(trans('global.user.fields.email')); ?>*</label>
                <input type="email" id="email" name="email" class="form-control">
                <?php if($errors->has('email')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('email')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.user.fields.email_helper')); ?>

                </p>
            </div>
            <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
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
            <div class="form-group <?php echo e($errors->has('roles') ? 'has-error' : ''); ?>">
                <label for="roles"><?php echo e(trans('global.user.fields.roles')); ?>*</label>
                <select name="roles[]" id="roles" class="form-control select2">
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($id); ?>">
                            <?php echo e($role); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('roles')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('roles')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('global.user.fields.roles_helper')); ?>

                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="<?php echo e(trans('global.save')); ?>">
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\resources\views/admin/users/create.blade.php ENDPATH**/ ?>