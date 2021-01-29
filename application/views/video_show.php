<?php 
// echo '<pre>';
// print_r($videos);
?>


<?php if($videos->totalHits > 0){ ?>
	<div class="row">
		<?php foreach ($videos->hits as $video) { ?>
		<div class="col-sm-3">
			<video width="100%" controls>
			  	<source src="<?=$video->videos->tiny->url?>" type="video/mp4">
			</video>			
		</div>
		<?php } ?>
	</div>
	<?php if($videos->hits){ ?>
		<div class="col-12 text-center mt-5">
			<button class="btn btn-warning" onclick="more_video(this)"> Load More Videos... </button>
		</div>
	<?php } else { ?>
		<h3 class="text-danger text-center"> No More video Found...</h3>
	<?php } ?>
<?php } else { ?>
	<h3 class="text-danger text-center"> No Video Found...</h3>
<?php } ?>