<?php $__env->startSection('css'); ?>
  <style>
    html,
    body {
      height: 100%;
    }
    body {
      color: white;
      text-align: center;
    }
    .site-wrapper {
      display: table;
      width: 100%;
      height: 100%;
      min-height: 100%;
    }
    .site-wrapper-inner {
      display: table-cell;
      vertical-align: middle;
      margin-right: auto;
      margin-left: auto;
      width: 100%;
      padding: 0 1.5rem;
    }
  </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <div class="site-wrapper">
    <main role="main" class="site-wrapper-inner">
      <h1><?php echo $__env->yieldContent('title'); ?></h1>
      <p class="lead"><?php echo $__env->yieldContent('text'); ?></p>
    </main>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>