<?php $__env->startSection('content'); ?>
    <main class="container-fluid">
        <?php if(isset($category)): ?>
            <h2 class="text-title mb-3"><?php echo e($category->name); ?></h2>
        <?php endif; ?>
        <?php if(isset($user)): ?>
            <h2 class="text-title mb-3"><?php echo e(__('Photos de ') . $user->name); ?></h2>
        <?php endif; ?>
        <div class="card-columns">
            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card">
                    <a href="<?php echo e(url('images/' . $image->name)); ?>" class="image-link"><img class="card-img-top" src="<?php echo e(url('thumbs/' . $image->name)); ?>" alt="image"></a>
                    <?php if(isset($image->description)): ?>
                        <div class="card-body">
                            <p class="card-text"><?php echo e($image->description); ?></p>
                        </div>
                    <?php endif; ?>
                    <div class="card-footer text-muted">
                        <small><em>
                                <a href="<?php echo e(route('user', $image->user->id)); ?>" data-toggle="popover" data-placement="right" data-content="<?php echo e(__('Voir les photos de ') . $image->user->name); ?>" title="<?php echo e(__('Voir les photos de ') . $image->user->name); ?>"><?php echo e($image->user->name); ?></a>
                            </em></small>
                        <small class="pull-right">
                            <em>
                                <?php echo e($image->created_at); ?>

                                <?php if (\Illuminate\Support\Facades\Blade::check('adminOrOwner', $image->user_id)): ?>
                                <a class="form-delete" href="<?php echo e(route('image.destroy', $image->id)); ?>" data-toggle="tooltip" title="<?php echo app('translator')->getFromJson('Supprimer cette photo'); ?>"><i class="fa fa-trash"></i></a>
                                <form action="<?php echo e(route('image.destroy', $image->id)); ?>" method="POST" class="hide">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field('DELETE')); ?>

                                </form>
                                <?php endif; ?>
                            </em>
                        </small>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="d-flex justify-content-center">
            <?php echo e($images->links()); ?>

        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(function() {
            $('[data-toggle="popover"]').popover()
            $('.card-columns').magnificPopup({
                delegate: 'a.image-link',
                type: 'image',
                gallery: { enabled: true }
            });
            $('a.form-delete').click(function(e) {
                e.preventDefault();
                let href = $(this).attr('href')
                $("form[action='" + href + "'").submit()
            })
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>