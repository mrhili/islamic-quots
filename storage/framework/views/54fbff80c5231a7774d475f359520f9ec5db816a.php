<?php $__env->startSection('card'); ?>
    <?php $__env->startComponent('components.card'); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->getFromJson('Connexion'); ?>
        <?php $__env->endSlot(); ?>
        <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo e(csrf_field()); ?>

            <?php echo $__env->make('partials.form-group', [
                'title' => __('Adresse email'),
                'type' => 'email',
                'name' => 'email',
                'required' => true,
                ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('partials.form-group', [
                'title' => __('Mot de passe'),
                'type' => 'password',
                'name' => 'password',
                'required' => true,
                ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
            
            
            <?php $__env->startComponent('components.button'); ?>
                <?php echo app('translator')->getFromJson('Connexion'); ?>
            <?php echo $__env->renderComponent(); ?>
            <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                <?php echo app('translator')->getFromJson('Mot de passe oublié ?'); ?>
            </a>
        </form>
    <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>