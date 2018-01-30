<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.9.0/css/bootstrap-slider.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('card'); ?>
    <?php $__env->startComponent('components.card'); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->getFromJson('Modifer le profil'); ?>
        <?php $__env->endSlot(); ?>
        <form method="POST" action="<?php echo e(route('profile.update', $user->id)); ?>">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>

            <?php echo $__env->make('partials.form-group', [
                'title' => __('Adresse email'),
                'type' => 'email',
                'name' => 'email',
                'required' => true,
                'value' => $user->email,
                ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="form-group">
                <?php echo app('translator')->getFromJson('Pagination : '); ?><span id="nbr"><?php echo e($settings->pagination); ?></span> <?php echo app('translator')->getFromJson('images par page'); ?><br>
                <input id="pagination" name="pagination" type="number" data-slider-min="3" data-slider-max="20" data-slider-step="1" data-slider-value="<?php echo e($settings->pagination); ?>"/><br>                
            </div>
            <?php $__env->startComponent('components.button'); ?>
                <?php echo app('translator')->getFromJson('Envoyer'); ?>
            <?php echo $__env->renderComponent(); ?>
        </form> 
    <?php echo $__env->renderComponent(); ?>            
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.9.0/bootstrap-slider.min.js"></script>
    <script>
        $(function() {
            $("#pagination")
            .slider()
            .on("slide", function(e) {
                $("#nbr").text(e.value)
            })
            .on("change", function(e) {
                $("#nbr").text(e.value.newValue)
            })
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>