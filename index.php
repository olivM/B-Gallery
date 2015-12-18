<?php

require_once('settings.php');

require_once('header.php');

?>

	<div class="row galleries">
	<?php

	foreach(glob('galleries/*') as $gallery):

		?>
		<div class="col-md-3">
			<a href="<?php print $gallery ?>">
				<img src="<?php print $gallery ?>/thumb.jpg" class="img-thumbnail">
				<strong><?php print preg_replace("#^galleries/#", "", $gallery) ?></strong>
			</a>
		</div>
		<?php

	endforeach;

	?>
	</div>

<?php

require_once('footer.php');

?>
