<section class="contact-us block background" id="contacts">
	<div class="content-width">
		<h3 class="header"><?php echo app('translator')->getFromJson('Напишите нам'); ?></h3>

		<?php echo Form::open([
			'url' => \Revy::getLanguage()->code.'/send/contact', 
			'class' => 'form darker', 
			'@submit.prevent' => 'onSubmit($event)',
			'@keydown' => 'form.errors.clear($event.target.name)'
		]); ?>


			<div class="row">
				<div class="col">
					<div class="input-container">
						<?php echo e(Form::email('email', null, ['placeholder' => __('E-mail'), 'v-model' => 'form.email'])); ?>

						
						<i class="error-flag" :class="{ visible: form.errors.has('email') }">!</i>
					</div>
				</div>
				<div class="col">
					<div class="input-container">
						<?php echo e(Form::text('phone', null, ['placeholder' => __('Телефон'), 'v-model' => 'form.phone'])); ?>

						<span v-show="!form.phone">(<?php echo app('translator')->getFromJson('необязательно'); ?>)</span>
						
						<i class="error-flag" :class="{ visible: form.errors.has('phone') }">!</i>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="input-container">
					<?php echo e(Form::textarea('message', null, ['placeholder' => __('Ваше сообщение ...'), 'v-model' => 'form.message'])); ?>

					
					<i class="error-flag" :class="{ visible: form.errors.has('message') }">!</i>
				</div>
			</div>

			<?php echo e(Form::submit(__('Отправить сообщение'), ['class' => 'button primary'])); ?>


		<?php echo Form::close(); ?>

	</div>
</section>