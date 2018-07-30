<noscript>
	You need to enable JavaScript to run this app.
</noscript>

<script>
	window.WP_GENERAL_SETTINGS = '<?php echo json_encode( TruEdit_Wp::get_general_settings() ); ?>';
</script>

<div
	id="root"
	class="TruEdit-app"
	data-rest-route="<?php echo get_rest_url(); ?>truedit/v1/"
	></div>
<div id="modal-root" class="TruEdit-app"></div>
