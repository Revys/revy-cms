<a class="active-panel__button index-parases"><i class="icon fa fa-refresh"></i><?php echo app('translator')->getFromJson('Проиндексировать фразы'); ?></a>

<?php $__env->startPush("js"); ?>
    <script>
        $(".index-parases").bind("click", function(){
            $("#translations").request({
                controller: "language",
                action: "index_phrases",
                data: {
                    language: "<?php echo e($object->id); ?>"
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>