<noscript>
	You need to enable JavaScript to run this app.
</noscript>
<script type="text/javascript">
	window.WP_GENERAL_SETTINGS = '<?php echo wp_json_encode( TruEdit_Wp::get_general_settings() ); ?>';
</script>
<div
	id="root"
	class="TruEdit-app"
	data-rest-route="<?php echo esc_url( get_rest_url() ); ?>truedit/v1/"
	></div>
<div id="modal-root" class="TruEdit-app"></div>
<script type="text/javascript" src="https://unpkg.com/@umds/object-assign@4.1.1-beta.24/object-assign.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/react@16.3.2/umd/react.production.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/react-dom@16.3.2/umd/react-dom.production.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/axios@0.17.1/dist/axios.min.js"></script>
