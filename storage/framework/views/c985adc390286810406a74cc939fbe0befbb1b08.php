<?php if(count($services)): ?>
    <section class="services content-width block">
        <h3 class="header"><?php echo app('translator')->getFromJson('Чем мы занимаемся?'); ?></h3>

        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="service">
                <?php echo e(Html::image(asset('storage/' . $service->images()->first()->getPath()), $service->title)); ?>

                <h2 class="title"><?php echo e($service->title); ?></h2>
                <p><?php echo e($service->description); ?></p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
            
            
            
        
        
            
            
            
        
        
            
            
            
        
    </section>
<?php endif; ?>