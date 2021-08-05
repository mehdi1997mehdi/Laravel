<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-group">
            <div class="card p-4">
                <div class="card-body">
                    <?php if(\Session::has('message')): ?>
                        <p class="alert alert-info">
                            <?php echo e(\Session::get('message')); ?>

                        </p>
                    <?php endif; ?>
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <h1>
                            <div class="login-logo ">

<center class="text-info ">
                                <?php echo e(trans('global.site_title')); ?>

                            </center>
                            </div>
                        </h1>
                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user    "></i></span>
                            </div>
                            <input name="email" type="text" class="form-control <?php if($errors->has('email')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(trans('global.login_email')); ?>">
                            <?php if($errors->has('email')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('email')); ?>

                                </em>
                            <?php endif; ?>
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input name="password" type="password" class="form-control <?php if($errors->has('password')): ?> is-invalid <?php endif; ?>" placeholder="Mot de passe">
                            <?php if($errors->has('password')): ?>
                                <em class="invalid-feedback">
                                    <?php echo e($errors->first('password')); ?>

                                </em>
                            <?php endif; ?>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <input type="submit" class="btn btn-primary px-4" value='Connexion'>
                                <label class="ml-2">
                                    <input name="remember" type="checkbox" /> Rester connecté
                                </label>
                            </div>
                            <div class="col-6 text-right">
                                <a class="btn btn-link px-0" href="<?php echo e(route('password.request')); ?>">
                                    Mot de passe oublié?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\resources\views/auth/login.blade.php ENDPATH**/ ?>