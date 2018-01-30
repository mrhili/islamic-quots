<?php $__env->startSection('card'); ?>
    <?php $__env->startComponent('components.card'); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->getFromJson('Gestion des catégories'); ?>
        <?php $__env->endSlot(); ?>
        
        <table class="table table-dark">
            <tbody>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($category->name); ?></td>
                        <td>                            
                            <a type="button" href="<?php echo e(route('category.destroy', $category->id)); ?>" class="btn btn-danger btn-sm pull-right" data-toggle="popover" data-placement="right" data-content="<?php echo app('translator')->getFromJson('Supprimer la catégorie'); ?> <?php echo e($category->name); ?>" title="<?php echo app('translator')->getFromJson('Supprimer la catégorie'); ?> <?php echo e($category->name); ?>"><i class="fa fa-trash fa-lg"></i></a>
                            <a type="button" href="<?php echo e(route('category.edit', $category->id)); ?>" class="btn btn-warning btn-sm pull-right mr-2" data-toggle="popover" data-placement="right" data-content="<?php echo app('translator')->getFromJson('Modifier la catégorie'); ?> <?php echo e($category->name); ?>" title="<?php echo app('translator')->getFromJson('Modifier la catégorie'); ?> <?php echo e($category->name); ?>"><i class="fa fa-edit fa-lg"></i></a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php echo $__env->renderComponent(); ?>            
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            })
            $('[data-toggle="popover"]').popover()
            $('a.btn-danger').click(function(e) {
                let that = $(this)
                e.preventDefault()
                swal({
                    title: '<?php echo app('translator')->getFromJson('Vraiment supprimer cette catégorie ?'); ?>',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: '<?php echo app('translator')->getFromJson('Oui'); ?>',
                    cancelButtonText: '<?php echo app('translator')->getFromJson('Non'); ?>'
                }).then(function () {
                    $('[data-toggle="popover"]').popover('hide')
                    $.ajax({                        
                        url: that.attr('href'),
                        type: 'DELETE'
                    })
                        .done(function () {
                            that.parents('tr').remove()
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
<?php echo $__env->make('layouts.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>