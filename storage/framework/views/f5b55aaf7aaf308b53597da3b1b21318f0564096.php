<?php $__env->startSection('card'); ?>
    <?php $__env->startComponent('components.card'); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->getFromJson('Ajouter une catégorie'); ?>
        <?php $__env->endSlot(); ?>
        <form method="POST" action="<?php echo e(route('category.store')); ?>">
            <?php echo e(csrf_field()); ?>

            <?php echo $__env->make('partials.form-group', [
                'title' => __('Nom'),
                'type' => 'text',
                'name' => 'name',
                'required' => true,
                ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php $__env->startComponent('components.button'); ?>
                <?php echo app('translator')->getFromJson('Envoyer'); ?>
            <?php echo $__env->renderComponent(); ?>
        </form>
    <?php echo $__env->renderComponent(); ?>            
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>