<!-- Alerts -->
<alerts inline-template>
	<div id="alerts">
		<div
			class="alert"
			v-for="(alert, index) in reversedAlerts()"
			v-bind:key="index"
			:class="[ !alert.visible ? 'alert--hidden' : '', 'alert--' + alert.tag ]"
			:data-index="index"
			@click="remove(index)"
			v-text="alert.message"
			v-show="alert.visible"
		></div>
	</div>
</alerts>

<?php $__env->startPush('vue'); ?>
	<script>
		<?php if(isset($alerts)): ?>
			$(function(){
				setTimeout(function(){
					<?php $__currentLoopData = $alerts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						Alerts.add("<?php echo e($alert['message']); ?>", "<?php echo e($alert['tag']); ?>", <?php echo e($alert['time']); ?>);
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				}, 200);
			});
		<?php endif; ?>

		Vue.component('alerts', {
			data: function() {
				return {
					alerts: []
				}
			},

			mounted: function(){
				window.Alerts = this;
			},

			methods: {
				// Add alert.
				add(message, tag = 'default', time = 3) {
					if (!message) 
						return false;
		
					let i = this.alerts.length;

					this.alerts.push({
						message: message,
						tag: tag,
						created: Date.now(),
						time: time,
						key: i,
						visible: true
					});
					
					setTimeout(function() { Alerts.hide(Alerts.alerts[i]); }, time * 1000);
				},

				// Clear all alerts
				clear() {
					this.alerts = {};
				},

				// Clear all alerts
				remove(index) {
					this.alerts[index].visible = false;
					
					this.clearOld();
				},

				// Clear old alerts
				clearOld() {
					let now = Date.now();

					this.alerts = this.alerts.filter(function (alert) {
						return (alert.visible != false && alert.created + alert.time * 1000 > now);
					});
				},

				// Determine if there are any alerts
				any() {
					return this.alerts.length > 0;
				},

				// Determine if there are any alerts
				hide(alert) {
					if (alert)
						alert.visible = false;

					let stop = false;

					for (i in this.alerts) {
						if (this.alerts[i].visible == true)
							stop = true;
					}

					if (!stop) setTimeout(function() { Alerts.clearOld(); }, 500);
				},

				reversedAlerts() {
					return this.alerts.slice().reverse();
				},

				className(tag) {
					return 'alert--' + tag;
				}
			}
		});
	</script>

<?php $__env->stopPush(); ?>