<?php $__env->startSection('title'); ?>
  <?php echo app('translator')->getFromJson('Erreur 404'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('text'); ?>
  <?php echo app('translator')->getFromJson("Cette page n'existe pas"); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('errors.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>