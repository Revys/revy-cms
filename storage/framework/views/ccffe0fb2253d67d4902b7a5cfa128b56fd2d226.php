<div class="form__group">
    <label class="form__group__label" for="form-input-<?php echo e($field['field']); ?>"><?php echo e($field['label']); ?></label>
    <div class="form__group__input-group">
        <?php echo e(Form::file(
            $field['field'],
            [
                'multiple' => ($field['field'] == 'images' ? true : false),
                'id' => 'form-input-' . $field['field'],
                'class' => 'form__group__input ' .
                           'form__group__image ' .
                           ($errors->any($field['field']) ? 'form__group__input--error form__group__image--error' : '')
            ]
        )); ?>


        <?php echo $__env->make($controller->getViewRoute('fields.images.list'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->make($controller->getViewRoute('fields._errors'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php $__env->startPush('js'); ?>
            <script>

            </script>
        <?php $__env->stopPush(); ?>
    </div>
</div>