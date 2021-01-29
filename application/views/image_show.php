<?php 
// echo '<pre>';
// print_r($images);
?>
<?php if($images->totalHits > 0){ ?>
	<div class="row">
		<?php foreach ($images->hits as $image) { ?>
		<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
			<a class="fancybox" rel="group" href="<?=$image->largeImageURL?>"><img src="<?=$image->previewURL?>" class="img-thumbnail rounded"></a>
		</div>
		<?php } ?>
	</div>
	<?php if($images->hits){ ?>
		<div class="col-12 text-center mt-5">
			<button class="btn btn-warning" onclick="more_image(this)"> Load More Images... </button>
		</div>
	<?php } else { ?>
		<h3 class="text-danger text-center"> No More Image Found...</h3>
	<?php } ?>
<?php } else { ?>
	<h3 class="text-danger text-center"> No Image Found...</h3>
<?php } ?>