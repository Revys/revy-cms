<?php if(count($services)): ?>
    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <section class="services content-width block">
            <h3 class="header"><?php echo app('translator')->getFromJson('Чем мы занимаемся?'); ?></h3>

            <div class="service">
                <?php echo e(Html::image('img/site/service-1.png', __('Изготовление сайтов'))); ?>

                <h2 class="title"><?php echo app('translator')->getFromJson('Изготовление сайтов'); ?></h2>
                <p><?php echo app('translator')->getFromJson('We strive to ensure that our customers are satisfied and we work continuously to develop your projects and surpass your expectations.'); ?></p>
            </div>
            <div class="service">
                <?php echo e(Html::image('img/site/service-2.png', __('Разработка дизайна'))); ?>

                <h2 class="title"><?php echo app('translator')->getFromJson('Разработка дизайна'); ?></h2>
                <p><?php echo app('translator')->getFromJson('Rankings, links, brand, content, traffic – all you need is right here! Simply drop us a line, and you will get your conversions!'); ?></p>
            </div>
            <div class="service">
                <?php echo e(Html::image('img/site/service-3.png', __('Проектирование веб-приложений'))); ?>

                <h2 class="title"><?php echo app('translator')->getFromJson('Проектирование веб-приложений'); ?></h2>
                <p><?php echo app('translator')->getFromJson('We have been on web marketing for 12 years helping you compete on Internet and converting your visitors into your clients.'); ?></p>
            </div>
        </section>
    @end
<?php endif; ?>