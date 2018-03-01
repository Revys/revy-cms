

<?php $__env->startSection('content'); ?>

	<section class="login-block">
		<?php echo Form::open([
			'route' => 'admin::login::signin',
			'class' => 'form',
			'id' => 'login-block',
			'@submit.prevent' => 'onSubmit($event)',
			'@keydown' => 'form.errors.clear($event.target.name)'
		]); ?>


			<h1><?php echo app('translator')->getFromJson('Вход в систему'); ?></h1>

			<div class="form__group">
				<label class="form__group__label" for="form-input-id"><?php echo app('translator')->getFromJson('Логин'); ?> / <?php echo app('translator')->getFromJson('Email'); ?></label>
				<?php echo e(Form::text('id', null, ['v-model' => 'form.id', 'id' => 'form-input-id', 'class' => 'form__group__input'])); ?>


				 <i class="error-flag" :class="{ visible: form.errors.has('email') }">!</i>
			</div>

			<div class="form__group">
				<label class="form__group__label" for="form-input-password"><?php echo app('translator')->getFromJson('Пароль'); ?></label>
				<?php echo e(Form::password('password', ['v-model' => 'form.password', 'id' => 'form-input-password', 'class' => 'form__group__input'])); ?>


				 <i class="error-flag" :class="{ visible: form.errors.has('password') }">!</i>
			</div>

			<div class="form__group form__group--toggler">
				<label class="form__group__label" for="form-input-remember"><?php echo app('translator')->getFromJson('Запомнить меня'); ?></label>
				<div class="switcher">
					<input type="checkbox" id="form-input-remember" v-model="form.remember">
					<div class="switcher__lever"></div>
				</div>
			</div>

			<?php echo e(Form::submit(__('Вход'), ['class' => 'button button--primary'])); ?>


		<?php echo Form::close(); ?>

	</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
	<script>
		// Login Form
		window.LoginForm = new Vue({
			el: '#login-block',

			data: {
				form: new Form({
					id: '',
					password: '',
					remember: false
				})
			},

			methods: {
				onSubmit(e) {
					let form = this.form;

					form.post(e.target.action)
						.then(response => {
							if (! response.error) {
                                function getUrlVars() {
                                    var vars = {};
                                    window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
                                        vars[key] = value;
                                    });
                                    return vars;
                                }

                                if (getUrlVars()['redirect'])
                                    window.location.href = decodeURIComponent(getUrlVars()['redirect']);
                                else
                                    window.location.href = "../";
							} else {
								form.set(response);
							}
						});
				}
			}
		});
	</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin::layouts.enter-screen', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>