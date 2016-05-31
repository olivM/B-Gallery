<?php

require_once('settings.php');

require_once('header.php');

?>

	<div class="row galleries">
	<?php

	foreach(glob('galleries/*') as $gallery):

		if ($idx && $idx % 4 == 0 ):
			?>
			</div>
			<div class="row galleries">
			<?php
		endif;
		?>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<a href="<?php print $gallery ?>">
				<img src="<?php print $gallery ?>/thumb.jpg" class="img-thumbnail">
				<!-- <strong><?php print preg_replace("#^galleries/#", "", $gallery) ?></strong> -->
			</a>
		</div>
		<?php
		$idx++;

	endforeach;

	?>
	</div>

<?php

require_once('footer.php');

?>
