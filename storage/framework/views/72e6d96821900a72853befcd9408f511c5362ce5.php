<?php
    $style = (isset($style)) ? $style : 'default';
    $type = $type ?? 'link';
    $method = $method ?? 'GET';
?>

<?php if($type == 'submit'): ?>
    <?php echo e(Form::button($label, ['type' => 'submit', 'class' => 'button button--' . $style . ' button--' . $action])); ?>

<?php else: ?>
    <?php if($method == 'GET'): ?>
        <a class="button button--<?php echo e($style); ?> button--<?php echo e($action); ?>"
           href="<?php if(isset($href) && is_callable($href)): ?><?php echo e($href($controller_name, (isset($object) ? $object : null))); ?><?php else: ?><?php echo e($href); ?><?php endif; ?>"><?php echo $label; ?></a>
    <?php else: ?>
        <a class="button button--<?php echo e($style); ?> button--<?php echo e($action); ?>" href="javascript:void(0)"
           id="button-<?php echo e($action); ?>"><?php echo $label; ?></a>

        <?php $__env->startPush('js'); ?>
            <script>
                $("#button-<?php echo e($action); ?>").click(function () {
                    let button_url = "<?php if(isset($href) && is_callable($href)): ?><?php echo e($href($controller_name, (isset($object) ? $object : null))); ?><?php else: ?><?php echo e($href); ?><?php endif; ?>";
                    axios['delete'](button_url, {})
                        .then(response => {
                            if (response.data.redirect)
                                window.location.href = response.data.redirect;
                        });
                });
            </script>
        <?php $__env->stopPush(); ?>
    <?php endif; ?>
<?php endif; ?>