<div class="wrap">
	<h1>Announcement Bar Settings</h1>
	<p>Thanks for using my plugin, you are awesome!</p>
	<form method="post" action="options.php">
		<?php
			settings_fields('rad_ab_group');
			$values = get_option('rad_ab');
		?>
		<label>Text for the bar:</label>
		<input type="text" name="rad_ab[bartext]" value="<?php echo $values['bartext'] ?>" class="regular-text">
		<br>
		
		<label>URL for the button:</label>
		<input type="url" name="rad_ab[url]" value="<?php echo $values['url'] ?>" class="regular-text">

		<?php submit_button('Save Settings'); ?>
	</form>
</div>