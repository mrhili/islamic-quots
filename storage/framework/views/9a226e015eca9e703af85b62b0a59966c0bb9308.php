<?php $__env->startSection('content'); ?>
    <main class="container-fluid">
        <h1>
            <?php echo e($countOrphans); ?> <?php echo e(trans_choice(__('image orpheline|images orphelines'), $countOrphans)); ?>

            <?php if($countOrphans): ?>
                <a class="btn btn-danger pull-right" href="<?php echo e(route('maintenance.destroy')); ?>" role="button"><?php echo app('translator')->getFromJson('Supprimer'); ?></a>
            <?php endif; ?>
        </h1>
        <div class="card-columns">
            <?php $__currentLoopData = $orphans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orphan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card">
                    <img class="img-fluid" src="<?php echo e(url('thumbs/' . $orphan)); ?>" alt="image">
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            })
            $('a.btn-danger').click(function(e) {
                let that = $(this)
                e.preventDefault()
                swal({
                    title: '<?php echo app('translator')->getFromJson('Vraiment supprimer toutes les photos orphelines ?'); ?>',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: '<?php echo app('translator')->getFromJson('Oui'); ?>',
                    cancelButtonText: '<?php echo app('translator')->getFromJson('Non'); ?>'
                }).then(function () {
                    $.ajax({
                        url: that.attr('href'),
                        type: 'DELETE'
                    })
                        .done(function () {
                            location.reload();
                        })
                        .fail(function () {
                            swal({
                                title: '<?php echo app('translator')->getFromJson('Il semble y avoir une erreur sur le serveur, veuillez réessayer plus tard...'); ?>',
                                type: 'warning'
                            })
                        }
                    )
                })
            })
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>