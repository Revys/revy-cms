<section class="card-holder" id="translations">
	<?php $__currentLoopData = $translations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php if(count($group['phrases']) > 0): ?>
			<div class="card card--form translations">
				<?php echo Form::open([
					'route' => ['admin::path', $controller_name, 'save_translations'],
					'class' => 'form--ajax'
				]); ?>

					<div class="card__header">
						<h2><?php echo e($group['title']); ?></h2>
					</div>

					<?php echo e(Form::hidden('group', $group['name'])); ?>

					<?php echo e(Form::text('language', $group['language'])); ?>


					<table class="data-table data-table--fixed data-table--auto translations__phrases">
						<thead>
							<tr class="data-table__titles">
								<td class="data-table__titles__title"><?php echo app('translator')->getFromJson('Фраза'); ?></td>
								<td class="data-table__titles__title"><?php echo app('translator')->getFromJson('Перевод'); ?></td>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $group['phrases']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phrase => $translation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr class="data-table__values translations__phrase">
									<td class="data-table__values__value">
										<?php echo e($phrase); ?>

									</td>
									<td class="data-table__values__value">
										<?php echo e(Form::text(
											'translations[' . $phrase . ']', 
											$translation, 
											[
												'class' => 'form__group__input form__group__input--h-small'
											]
										)); ?>

									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
					<div class="card-buttons">
						<?php echo $__env->make("admin::components.button.save", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					</div>
				<?php echo Form::close(); ?>

			</div>
		<?php endif; ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>