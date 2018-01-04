<section class="card card--list" id="<?php echo e($oc); ?>">
	<?php if(isset($caption)): ?>
		<div class="card__header">
			<?php echo e($caption); ?>

		</div>
	<?php endif; ?>
	<div class="card__content">
		<?php if(isset($items) && ($items->hasMorePages() || $items->previousPageUrl() !== '' || $order || $filters)): ?>
			<div class="card__header">
				<?php echo $__env->make($controller->getViewRoute('order'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php echo $__env->make($controller->getViewRoute('pagination'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			</div>
		<?php endif; ?>
		
		<?php if(isset($items) && count($items)): ?>
			<table class="data-table<?php echo e(!isset($auto_width) ? ' data-table--fixed' : ''); ?>">
				<thead>
					<tr class="data-table__titles">
						<?php if(isset($selectable)): ?>
							<td class="data-table__checkbox">
								<div class="checkbox">
									<input type="checkbox" class="checkbox__input" id="<?php echo e($oc); ?>-checkbox-field-parent" />
									<label class="checkbox__label" for="<?php echo e($oc); ?>-checkbox-field-parent"></label>
								</div>
							</td>
						<?php endif; ?>
						
						<?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<td class="data-table__titles__title"><?php echo e($field['title']); ?></td>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tr>
				</thead>

				<tbody>
					<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr class="data-table__values<?php echo e($item->isHidden() ? ' data-table__values--state-block' : ''); ?>">
							<?php if(isset($selectable)): ?>
								<td class="data-table__checkbox">
									<div class="checkbox">
										<input type="checkbox" name="items[]" value="<?php echo e($item->id); ?>" class="checkbox__input" id="<?php echo e($oc); ?>-checkbox-field-<?php echo e($item->id); ?>" />
										<label class="checkbox__label" for="<?php echo e($oc); ?>-checkbox-field-<?php echo e($item->id); ?>"></label>
									</div>
								</td>
							<?php endif; ?>
							
							<?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<td class="data-table__values__value">
									<?php if(isset($field['link']) && is_string($field['link'])): ?>
										<a class="data-table__values__value__link" href="<?php echo e($field['link']); ?>"><?php echo e($item->{$field['field']}); ?></a>
									<?php elseif(isset($field['link']) && is_callable($field['link'])): ?>
										<a class="data-table__values__value__link" href="<?php echo e($field['link']($item)); ?>"><?php echo e($item->{$field['field']}); ?></a>
									<?php elseif(isset($field['link'])): ?>
										<a class="data-table__values__value__link" href="<?php echo e(route('admin::edit', [$controller_name, $item->id])); ?>"><?php echo e($item->{$field['field']}); ?></a>
									<?php else: ?>
										<?php echo e($item->{$field['field']}); ?>

									<?php endif; ?>
								</td>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
			
			<?php echo $__env->make($controller->getViewRoute('actions'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php else: ?>
			<div class="not-found"><?php echo app('translator')->getFromJson('Элементы отсутствуют'); ?></div>
		<?php endif; ?>
	</div>
</section>

<?php echo $__env->make("admin::js.list", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>