<section class="advantages block dark" id="advantages">
	<div class="content-width">
		<h3 class="header"><?php echo app('translator')->getFromJson('Что вы получите?'); ?></h3>
		<h4><?php echo app('translator')->getFromJson('Сотрудничая с профессиональной web-студией InWEB, вы получаете огромные дивиденды!'); ?></h4>

		<div class="container">
			<?php if(\Revy::getLanguage()->code == 'ro'): ?>
				<div class="advantage">Опытнейшую <b>команду разработчиков</b>, в которую входят программисты, дизайнеры, маркетологи и копирайтеры</div>
				<div class="advantage">Действительно <b>крутой сайт</b>, который будет соответствовать всем поставленным задачам и целям</div>
				<div class="advantage"><b>Адаптивный и кроссбраузерный ресурс</b>, управлять которым не составит труда даже ребенку</div>
				<div class="advantage">Гарантийную <b>техническую и консультационную поддержку</b> на протяжении 31 дня после запуска</div>
			<?php else: ?>
				<div class="advantage">Опытнейшую <b>команду разработчиков</b>, в которую входят программисты, дизайнеры, маркетологи и копирайтеры</div>
				<div class="advantage">Действительно <b>крутой сайт</b>, который будет соответствовать всем поставленным задачам и целям</div>
				<div class="advantage"><b>Адаптивный и кроссбраузерный ресурс</b>, управлять которым не составит труда даже ребенку</div>
				<div class="advantage">Гарантийную <b>техническую и консультационную поддержку</b> на протяжении 31 дня после запуска</div>
			<?php endif; ?>

			<?php echo e(Html::image('img/site/advantages.svg', 'Advantages', ['width'=> '321', 'height' => '263', 'class' => 'image'])); ?>

		</div>
	</div>
</section>