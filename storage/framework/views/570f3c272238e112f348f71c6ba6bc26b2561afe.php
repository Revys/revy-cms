<?php echo $__env->make('admin::js.vue', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startPush('js'); ?>
    <?php echo $__env->make('admin::js.ajax', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopPush(); ?>

<div id="json"></div>