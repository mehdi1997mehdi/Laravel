<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-group">
            <div class="card p-4">
                <div class="card-body">
                    <?php if(\Session::has('status')): ?>
                        <p class="alert alert-info">
                            <?php echo e(\Session::get('status')); ?>

                        </p>
                    <?php endif; ?>
                    <form method="POST" action="<?php echo e(route('password.email')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <h1>
                            <div class="login-logo">
                                <center class="text-info">
                                    <?php echo e(trans('global.site_title')); ?>

                                </center>
                            </div>
                        </h1>
                        <p class="text-muted"></p>
                        <div>
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group has-feedback">
                                <input type="email" name="email" class="form-control <?php if($errors->has('email')): ?> is-invalid <?php endif; ?>" required="required"="autofocus" placeholder="<?php echo e(trans('global.login_email')); ?>">
                                <?php if($errors->has('email')): ?>
                                    <em class="invalid-feedback">
                                        <?php echo e($errors->first('email')); ?>

                                    </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">
                                    Envoyer lien de récupération
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>