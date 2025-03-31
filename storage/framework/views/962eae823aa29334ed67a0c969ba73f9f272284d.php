<!-- resources/views/welcome.blade.php -->



<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Welcome to Our Website')); ?></div>

                <div class="card-body">
                    <p>Welcome! Please choose an action to proceed:</p>
                    <!-- Login Button -->
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary">Login</a>
                    <!-- Register Button -->
                    <a href="<?php echo e(route('register')); ?>" class="btn btn-secondary">Register</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Second-Hand Car Price Project\Preccog_System\resources\views/welcome.blade.php ENDPATH**/ ?>