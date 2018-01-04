<header id="header">
	<div class="header__sitename">
		<a href="/<?php echo e($locale->code); ?>" class="header__sitename__link" target="_blank">
			<?php echo e(Html::image('admin-assets/img/site/logo.svg', false, ['class' => 'logo', 'width' => 32, 'height' => 32])); ?>


			<?php echo e(env('APP_NAME', __('Веб-сайт'))); ?>

		</a>
	</div>	
	
	<?php echo $__env->make("admin::navigation.top", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div class="header__language">
		<?php echo e(Form::select('language', \Revys\Revy\App\Language::getLanguages()->pluck('title', 'code')->toArray(), $locale->code, ['class' => 'select header__language__select'])); ?>

	</div>

	<?php $__env->startPush('js'); ?>
		<script>
			document.getElementsByClassName("header__language__select").select({
				staticWidth: true,
				afterChange: function(element) {
					window.location.href = "/<?php echo e($uri); ?>".replace("/<?php echo e($locale->code); ?>", "/" + element.value);
				}
			});
		</script>
	<?php $__env->stopPush(); ?>

	<div class="header__translation	<?php if (\Illuminate\Support\Facades\Blade::check('translation_mode')): ?> header__translation--active <?php endif; ?>" title="<?php echo e(__('Режим перевода')); ?>"><i class="icon icon--language"></i></div>

	<a href="<?php echo e(route('admin::settings')); ?>" class="header__settings"><i class="icon icon--settings"></i></a>

	<div class="header__user"><?php echo e($user->name); ?></div>
	
	<a href="<?php echo e(route('admin::login::logout')); ?>" class="header__exit"><i class="icon icon--exit"></i></a>
</header>

<?php $__env->startPush('js'); ?>
	<script>
		$(".header__translation").bind("click", function(e){
			let button = $(this);

			$.request({
				controller: "language",
				action: "toggle_translation_mode",
				complete: function(result) {
					button.toggleClass("header__translation--active");
					window.location.reload();
				}
			});
		});
	</script>
<?php $__env->stopPush(); ?>