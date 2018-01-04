<link rel="stylesheet" href="<?php echo e(asset('admin-assets/css/app.css')); ?>" />

<!-- CSRF Token -->
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<!-- Scripts -->
<script>
	window.Laravel = <?php echo json_encode([
		'csrfToken' => csrf_token(),
	]); ?>;
	window.language = '<?php echo e($locale->code); ?>';
</script>