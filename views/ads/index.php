<div class="container view">
	<section>
		<h1 class="section-title">All Listings</h1>
		<br>

		<?php foreach ($listing->attributes as $list): ?>

			<div class="col-xs-4">
				<a href="/ads/show/?id=<?= $list['id'] ?>"><img class="img-thumbnail img-responsive featured-image" alt="<?= $list['item_name']; ?>" src="<?= $list['item_image']; ?>"></a>
				<br>
				<h4><?= $list['item_name']; ?></h4>
				<strong>$<?= $list['item_price']; ?></strong>
				<hr>
			</div>
		<?php endforeach ?>

	</section>
</div>
