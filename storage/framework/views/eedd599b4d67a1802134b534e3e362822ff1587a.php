<div class="form-group">
    <label for="<?php echo e($name); ?>"><?php echo e($title); ?></label>
    <input id="<?php echo e($name); ?>" type="<?php echo e($type); ?>" class="form-control<?php echo e($errors->has($name) ? ' is-invalid' : ''); ?>" name="<?php echo e($name); ?>" value="<?php echo e(old($name, isset($value) ? $value : '')); ?>" <?php echo e($required ? 'required' : ''); ?>>
    <?php if($errors->has($name)): ?>
        <div class="invalid-feedback">
            <?php echo e($errors->first($name)); ?>

        </div>
    <?php endif; ?>
</div>