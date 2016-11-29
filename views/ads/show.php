<!--Page for single advertisement -->
<div class="container view">
	<div class="col-md-5">
		<div class="row">

			<img class="img-thumbnail img-responsive" alt="<?= $listing->item_name ?>" src="<?= $listing->item_image ?>">

		</div>
	</div>
	<div class="col-md-6">
		<div class="row">
			<div class="col-md-6">


				<h2><?= $listing->item_name ?></h2>
				<h2><small>$<?= $listing->item_price ?></small></h2>


			</div>
			<div class="col-md-6">
				<h3>Posted By:</h3>
				<h4><?= $listing->user()->id ?>"><?= $listing->user()->username ?></h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-8">
				<h3>Description</h3>
				<p><?= $listing->item_description ?></p>
			</div>
		</div>
	</div>
</div>