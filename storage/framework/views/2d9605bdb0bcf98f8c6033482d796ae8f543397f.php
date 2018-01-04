<div class="order-now block">
	<div class="content-width">
		<div class="text">
			<div class="text-first"><?php echo app('translator')->getFromJson('Закажите собственный сайт прямо сейчас'); ?></div>
			<div class="text-second"><?php echo app('translator')->getFromJson('И получите 3 месяца размещения на хостинге в подарок!'); ?></div>
		</div>
		<div class="button dark" @click="showPopup('call')"><?php echo app('translator')->getFromJson('Давайте работать!'); ?></div>
	</div>
</div>