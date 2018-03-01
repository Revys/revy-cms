<div class="form__group">
    <label class="form__group__label" for="form-input-<?php echo e($field['field']); ?>"><?php echo e($field['label']); ?></label>
    <div class="form__group__input-group">
        <?php echo e(Form::file(
            $field['field'],
            [
                'id' => 'form-input-' . $field['field'],
                'class' => 'form__group__input ' .
                           'form__group__image ' .
                           ($errors->any($field['field']) ? 'form__group__input--error form__group__image--error' : '')
            ]
        )); ?>


        <?php echo $__env->make($controller->getViewRoute('fields._errors'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php $__env->startPush('js'); ?>
            <script>
                $("#form-input-<?php echo e($field['field']); ?>").dropify({
                    defaultFile: '<?php echo e((isset($object) ? (! is_string($field['value']) ? $field['value']($object) : $object->{$field['value']}) : '')); ?>',
                    imgFileExtensions: ['png', 'jpg', 'jpeg', 'gif', 'svg'],
                    maxFileSizePreview: "5M",
                    allowedFileExtensions: ['png', 'jpg', 'jpeg', 'gif', 'svg'],
                    messages: {
                        'default': '<?php echo app('translator')->getFromJson('Перетащите файл или нажмите'); ?>',
                        'replace': '<?php echo app('translator')->getFromJson('Перетащите файл или нажмите'); ?>',
                        'remove':  '<?php echo app('translator')->getFromJson('Удалить'); ?>',
                        'error':   '<?php echo app('translator')->getFromJson('Произошла ошибка'); ?>'
                    },
                    error: {
                        'fileSize': '<?php echo app('translator')->getFromJson('Размер файла слишком велик'); ?> ({{ value }} <?php echo app('translator')->getFromJson('максимум'); ?>.',
                        'minWidth': '<?php echo app('translator')->getFromJson('Ширина изображения слишком маленькая'); ?> ({{ value }}}px <?php echo app('translator')->getFromJson('минимум'); ?>).',
                        'maxWidth': '<?php echo app('translator')->getFromJson('Ширина изображения слишком большая'); ?> ({{ value }}}px <?php echo app('translator')->getFromJson('максимум'); ?>).',
                        'minHeight': '<?php echo app('translator')->getFromJson('Высота изображения слишком маленькая'); ?> ({{ value }}}px <?php echo app('translator')->getFromJson('минимум'); ?>).',
                        'maxHeight': '<?php echo app('translator')->getFromJson('Высота изображения сликом большая'); ?> ({{ value }}px <?php echo app('translator')->getFromJson('максимум'); ?>).',
                        'imageFormat': '<?php echo app('translator')->getFromJson('Изображение имеет недопустимый формат'); ?> (<?php echo app('translator')->getFromJson('только'); ?> {{ value }})).',
                        'fileExtension': '<?php echo app('translator')->getFromJson('Файл имеет недопустимый формат'); ?> (<?php echo app('translator')->getFromJson('только'); ?> {{ value }})).',
                    }
                });
            </script>
        <?php $__env->stopPush(); ?>
    </div>
</div>