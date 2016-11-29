<?php

if(!Auth::check()){
        header("Location: /users/login");
}

	$user - Auth::user();

?>


<!--Page for user account home-->
<div class="container view">
<div class="row">
	<div class="col-md-5 col-md-offset-1">
		<h3>Contact Info:</h3>
		<p>
		<strong>Name: </strong> <?= $user->name ?>
		</p>
		<p>
		<strong>Username: </strong> <?= $user->username ?>
		</p>
		<p>
		<strong>Phone: </strong> <?= $user->phone ?>
		<p>
		<strong>Email: </strong> <?= $user->email ?>
		</p>
		<p>
		<strong>Address: </strong> <?= $user->address ?>
		</p>
		<h3>Vehicle Info:</h3>
		<p>
		<strong>Vehicle Make: </strong> <?= $user->vehicle_make ?>
		</p>
		<p>
		<strong>Vehicle Model: </strong> <?= $user->vehicle_model ?>
		</p>
		<p>
		<strong>Vehicle Color: </strong> <?= $user->vehicle_color ?>
		</p>

		<?php if (Auth::id() != Input::get('id')): ?>
		<a href="/account/edit/?id=<?= $user->id ?>" class="btn btn-primary hidden" >Edit Account</a>
		<?php else: ?>
		<a href="/account/edit/?id=<?= $user->id ?>" class="btn btn-primary" >Edit Account</a>
		<?php endif; ?>
	</div>

	<div class="col-md-6">
		<h3>Your listings</h3>
	<?php foreach($listing->attributes as $key => $list) : ?>
			<h4><?= $list['item_name']; ?></h4>
			<p>
				<?= substr($list['item_description'], 0, 100) . "..."; ?>
			</p>
			<p>
				<a href="/ads/show/?id=<?= $list['id']; ?>">See More</a>
			</p>
		<?php endforeach; ?>

		<?php if (Auth::id() != Input::get('id')): ?>
		<a href="/ads/create" class="btn btn-primary hidden">New Listing</a>
		<?php else: ?>
		<a href="/ads/create" class="btn btn-primary">New Listing</a>
		<?php endif; ?>
	</div>
</div>
</div>