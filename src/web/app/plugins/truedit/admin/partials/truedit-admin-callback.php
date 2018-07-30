<?php
/**
 * Template Name:      blank
 */
?>
<!DOCTYPE html>
<html>

<head>
	<?php show_admin_bar( false ); ?>
	<?php wp_admin_bar_render(); ?>
</head>
<body <?php body_class( 'wp-core-ui' ); ?>>

	<?php include_once( __DIR__ . '/truedit-admin-root.php' ); ?>

	<?php wp_footer(); ?>
</body>

</html>
