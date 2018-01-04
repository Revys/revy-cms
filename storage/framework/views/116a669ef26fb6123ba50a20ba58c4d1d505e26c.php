<?php echo Form::open(['url' => '/send/call', 'class' => 'form']); ?>


	<div class="row">
		<?php echo e(Form::text('phone', null, ['placeholder' => __('Введите ваш телефон'), 'autofocus' => 'autofocus'])); ?>

	</div>

	<?php echo e(Form::submit(__('Отправить'), ['class' => 'button primary'])); ?>


<?php echo Form::close(); ?>