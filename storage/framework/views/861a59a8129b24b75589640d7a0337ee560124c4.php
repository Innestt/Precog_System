

<?php $__env->startSection('content'); ?>

<div class="container">
    <h1>Car Price Prediction</h1>

    
    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('predict')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <!-- Brand Field -->
        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" name="brand" class="form-control" required value="<?php echo e(old('brand')); ?>">
        </div>

        <!-- Model Field -->
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" class="form-control" required value="<?php echo e(old('model')); ?>">
        </div>

        <!-- Year Field -->
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" name="year" class="form-control" required value="<?php echo e(old('year')); ?>">
        </div>

        <!-- Age Field -->
        <div class="form-group">
            <label for="age">Age (years)</label>
            <input type="number" name="age" class="form-control" required value="<?php echo e(old('age')); ?>">
        </div>

        <!-- KM Driven Field -->
        <div class="form-group">
            <label for="kmDriven">KM Driven</label>
            <input type="number" name="kmDriven" class="form-control" required value="<?php echo e(old('kmDriven')); ?>">
        </div>

        <!-- Transmission Field -->
        <div class="form-group">
            <label for="transmission">Transmission</label>
            <select name="transmission" class="form-control" required>
                <option value="Automatic" <?php echo e(old('transmission') == 'Automatic' ? 'selected' : ''); ?>>Automatic</option>
                <option value="Manual" <?php echo e(old('transmission') == 'Manual' ? 'selected' : ''); ?>>Manual</option>
            </select>
        </div>

        <!-- Owner Field -->
        <div class="form-group">
            <label for="owner">Owner</label>
            <select name="owner" class="form-control" required>
                <option value="First" <?php echo e(old('owner') == 'First' ? 'selected' : ''); ?>>First</option>
                <option value="Second" <?php echo e(old('owner') == 'Second' ? 'selected' : ''); ?>>Second</option>
            </select>
        </div>

        <!-- Fuel Type Field -->
        <div class="form-group">
            <label for="fuelType">Fuel Type</label>
            <select name="fuelType" class="form-control" required>
                <option value="Petrol" <?php echo e(old('fuelType') == 'Petrol' ? 'selected' : ''); ?>>Petrol</option>
                <option value="Diesel" <?php echo e(old('fuelType') == 'Diesel' ? 'selected' : ''); ?>>Diesel</option>
                <option value="CNG" <?php echo e(old('fuelType') == 'CNG' ? 'selected' : ''); ?>>CNG</option>
                <option value="Hybrid" <?php echo e(old('fuelType') == 'Hybrid' ? 'selected' : ''); ?>>Hybrid</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mt-3">Predict Price</button>
    </form>

    
    <?php if(isset($predicted_price)): ?>
        <div class="alert alert-success mt-3">
            <h4>Predicted Price: <?php echo e(number_format($predicted_price, 2)); ?></h4>
        </div>
    <?php endif; ?>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Second-Hand Car Price Project\Preccog_System\resources\views/search.blade.php ENDPATH**/ ?>