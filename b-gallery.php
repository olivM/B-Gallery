<?php
function sanitize($s) {
	return preg_replace("#[^\d\w]#", '-', $s);
}

function showImage($src, $type = null) {
	?>
	<div class="col-md-3 item item-<?php print sanitize($type) ?>" data-type="<?php print $type ?>">
		<!-- <a href="<?php print BGALLERY_URL.'/image.php?img='.BGALLERY_CURRENT.'/'.$src ?>" target="_blank"> -->
		<a href="<?php print $src ?>" target="_blank">
			<img data-src="<?php print BGALLERY_URL ?>thumbs/galleries/<?php print BGALLERY_CURRENT.'/'.$src ?>" class="img-thumbnail">
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
			<div class="col-md-6 col-md-offset-2">

				<div class="btn-group" data-toggle="buttons">
					<?php
					foreach(glob('*') as $dir):
						if ( is_dir($dir)):
							?>
							<label class="btn btn-sm btn-secondary" data-filter="<?php print sanitize($dir) ?>" for="filter-<?php print $dir ?>">
								<input type="checkbox" autocomplete="off" value="<?php print $dir ?>" id="filter-<?php print $dir ?>"> <i class="fa"></i>  <?php print $dir ?>
							</label>
							<?php
						endif;
					endforeach;
					?>
				</div>
			</div>
		</form>
	</div>

	<style type="text/css">
		.item { display: none; }
		.filter-all .item { display: block; }
		<?php
		foreach(glob('*') as $dir):
			if ( is_dir($dir)):
				?>
				.filter-<?php print sanitize($dir) ?> .item-<?php print sanitize($dir) ?> { display: block; }
				<?php
			endif;
		endforeach;
		?>
	</style>

	<div class="row items">
		<div id="filters" class="filter-all">
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
	</div>
