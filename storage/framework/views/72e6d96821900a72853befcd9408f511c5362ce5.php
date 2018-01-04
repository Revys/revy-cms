<?php 
    $style = (isset($style)) ? $style : 'default';
    $type = $type ?? 'link';
?>

<?php if($type == 'submit'): ?>
    <?php echo e(Form::button($label, ['type' => 'submit', 'class' => 'button button--' . $style . ' button--' . $action])); ?>

<?php else: ?>
    <a class="button button--<?php echo e($style); ?> button--<?php echo e($action); ?>" href="<?php if(isset($link) && is_callable($link)): ?><?php echo e($link($controller_name, (isset($object) ? $object : null))); ?><?php else: ?><?php echo e($link); ?><?php endif; ?>"><?php echo $label; ?></a>
<?php endif; ?>