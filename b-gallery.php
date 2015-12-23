<?php
function showImage($src, $type = null) {
	?>
	<div class="col-md-3" data-type="<?php print $type ?>">
		<!-- <a href="<?php print BGALLERY_URL.'/image.php?img='.BGALLERY_CURRENT.'/'.$src ?>" target="_blank"> -->
		<a href="<?php print $src ?>" target="_blank">
			<img src="<?php print BGALLERY_URL ?>thumbs/galleries/<?php print BGALLERY_CURRENT.'/'.$src ?>" class="img-thumbnail">
			<strong><?php print preg_replace("#(.*)\.(jpg|png)$#i", "\\1", basename($src)) ?></strong>
		</a>
	</div>
	<?php
}
?>
	<div class="row filters">
		<form>
			<div class="col-md-4">
				<input type="text" class="form-control form-control-sm" id="filter-search" placeholder="search...">
			</div>
			<div class="col-md-4 col-md-offset-4">

				<div class="btn-group" data-toggle="buttons">
					<?php
					foreach(glob('*') as $dir):
						if ( is_dir($dir)):
							?>
							<label class="btn btn-sm btn-secondary" data-filter="<?php print $dir ?>" for="filter-<?php print $dir ?>">
								<input type="checkbox" autocomplete="off" value="<?php print $dir ?>" id="filter-<?php print $dir ?>"> <?php print $dir ?>
							</label>
							<?php
						endif;
					endforeach;
					?>
				</div>
			</div>
		</form>
	</div>

	<div class="row items">
		<?php
		foreach(glob('*') as $dir):
			if ( is_dir($dir)):
				foreach(glob("$dir/*.*") as $img):
					showImage($img, $dir);
				endforeach;
			else:
				if ( ! preg_match("#\.php$#", $dir) && ! preg_match("#^thumb#", $dir)):
					showImage($dir);
				endif;
			endif;
		endforeach;
		?>
	</div>
