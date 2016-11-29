<?php 
	$listing = new Listing;
	$listing = $listing->findByListings($_REQUEST['search']);
	if(isset($_REQUEST['item_name']) && isset($_REQUEST['item_description']) && isset($_REQUEST['item_price']) && isset($_REQUEST['item-location_city'])  && isset($_REQUEST['item_location_state'])  && isset($_REQUEST['item_image'])) {
		$listing->item_name = Input::get('item_name');
		$listing->item_desctiption = Input::get('item_desctiption');
		$listing->item_price = Input::get('item_price');
		$listing->item_location_city = Input::get('item_location_city');
		$listing->item_location_state = Input::get('item_location_state');
		$listing->item_image = Input::get('item_image');
		$listing->user_id = $_SESSION['LOGGED_IN_ID'];
		$listing->save();
	}
?>

?>

<div class="container view">
	<section id="login">
		<div class="row">
			<h1 class="section-title">Edit Account</h1>

			<!-- checks username and password, if incorrect throws an error -->

				<?php if (isset($_SESSION['ERROR_MESSAGE'])) : ?>
	                <div class="alert alert-danger">
	                    <p class="error"><?= $_SESSION['ERROR_MESSAGE']; ?></p>
	                </div>
	              <?php unset($_SESSION['ERROR_MESSAGE']); ?>
	            <?php endif; ?>

	        <!-- checking to see if user is already signed in, if so success -->
	            <?php if (isset($_SESSION['SUCCESS_MESSAGE'])) : ?>
	                <div class="alert alert-success">
	                    <p class="success"><?= $_SESSION['SUCCESS_MESSAGE']; ?></p>
	                </div>
	              <?php unset($_SESSION['SUCCESS_MESSAGE']); ?>
	            <?php endif; ?>

	        <div class="col-md-6 col-md-offset-3">


				<form method="POST" action="" data-validation data-required-message="This field is required">
					<div class="form-group">
					    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" value="<?= $user->name; ?>" data-required>
					</div>
					<div class="form-group">
					    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= $user->email; ?>" data-required>
					</div>
					<div class="form-group">
					    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $user->username; ?>" data-required>
					</div>
					<button type="submit" class="btn btn-primary">Update Account</button>
				</form>
			</div>
		</div>
	</section>
</div>