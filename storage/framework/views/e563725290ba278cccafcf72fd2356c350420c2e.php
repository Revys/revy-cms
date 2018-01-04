<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">



<!-- SEO -->
<title><?php echo e($page->meta_title); ?></title>

<?php if( $page->meta_description ): ?>
	<meta name="description" content="<?php echo e($page->meta_description); ?>" />
<?php endif; ?>
<?php if( $page->meta_keywords ): ?>
	<meta name="keywords" content="<?php echo e($page->meta_keywords); ?>" />
<?php endif; ?>