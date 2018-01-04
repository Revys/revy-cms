<div class="top-block">
	<header id="header">
		<div class="content-width">
			<!-- Logo -->
			<a href="#" class="logo" onclick="$('body').goTo();"><?php echo e(Html::image('img/site/logo.png', env('APP_NAME', ''))); ?></a>

			<?php echo $__env->make('navigation.top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			
			<?php echo $__env->make('navigation.language', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

			<div class="phone-block">
				<i class="icon icon-phone-header" @click="showPopup('call')"></i>
				<span><?php echo e($phone); ?></span>
			</div>
		</div>
	</header>

	<?php echo $__env->make('catalog.banners', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>