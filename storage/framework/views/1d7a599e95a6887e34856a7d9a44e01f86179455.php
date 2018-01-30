<?php $__env->startSection('content'); ?>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <?php echo $__env->yieldContent('card'); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>