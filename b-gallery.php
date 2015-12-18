
	<div class="row filters">
		<form class="form-inline">
			<div class="col-md-4">
				<div class="form-group">
					<label for="filter-search">Email address</label>
					<input type="text" class="form-control input-sm" id="filter-search">
				</div>
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
				foreach(glob("$dir/*.jpg") as $img):
					?>
					<div class="col-md-3" data-type="<?php print $dir ?>">
						<a href="<?php print $img ?>">
							<img src="<?php print $img ?>" class="img-thumbnail">
							<strong><?php print preg_replace("#/(.*)\.jpg$#", "\\1", $img) ?></strong>
						</a>
					</div>
					<?php
					endforeach;
			endif;
		endforeach;

		?>
	</div>
