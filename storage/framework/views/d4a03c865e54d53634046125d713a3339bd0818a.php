<?php $__env->startSection('card'); ?>
    <?php $__env->startComponent('components.card'); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->getFromJson('Ajouter une image'); ?>
        <?php $__env->endSlot(); ?>
        <form method="POST" action="<?php echo e(route('image.store')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="form-group<?php echo e($errors->has('image') ? ' is-invalid' : ''); ?>">
                <label class="custom-file">
                    <input type="file" id="image" name="image" class="form-control<?php echo e($errors->has('image') ? ' is-invalid ' : ''); ?>custom-file-input" required>
                    <span class="custom-file-control form-control-file"></span>
                    <?php if($errors->has('image')): ?>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('image')); ?>

                        </div>
                    <?php endif; ?>
                </label>
            </div>
            <div class="form-group">
                <label for="category_id"><?php echo app('translator')->getFromJson('Catégorie'); ?></label>
                <select id="category_id" name="category_id" class="form-control">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php echo $__env->make('partials.form-group', [
                'title' => __('Description (optionnelle)'),
                'type' => 'text',
                'name' => 'description',
                'required' => false,
                ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>   
            <?php $__env->startComponent('components.button'); ?>
                <?php echo app('translator')->getFromJson('Envoyer'); ?>
            <?php echo $__env->renderComponent(); ?>
        </form>
    <?php echo $__env->renderComponent(); ?>            
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(function() {
            $('input[type="file"]').on('change',function(){
              let fileName = $(this).val().replace(/^.*[\\\/]/, '')
              $(this).next('.form-control-file').html(fileName)
            })
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>