<?php
$_SESSION['IS_LOGGED_IN'];
$_SESSION['LOGGED_IN_ID'];

if(Input::get('item_name') != '' &&
Input::get('item_description') != '' &&
Input::get('item_price') != '' &&
Input::get('item_location_city') != '' &&
Input::get('item_location_state') != ''){

$name = Input::get('item_name');
$description = Input::get('item_description');
$price = Input::get('item_price');
$city = Input::get('item_location_city');
$state = Input::get('item_location_state');
$image = Input::get('item_image');
$id = $_SESSION['LOGGED_IN_ID'];

$listing = new Listing();
$listing->item_name = $name;
$listing->item_description = $description;
$listing->item_price = $price;
$listing->item_location_city = $city;
$listing->item_location_state = $state;
$listing->item_image = $image;
$listing->user_id = $id;
$listing->save();



}

?>
<div class="container view">
	<section id="create">
		<div class="row">
			<center><h1 class="section-title">Create A listing!</h1></center>
			<div class="col-md-6 col-md-offset-3">

				<form method="POST" action="" data-validation data-required-message="This field is required" enctype="multipart/form-data">
					<div class="form-group">
					    <input type="text" class="form-control" id="name" name="item_name" placeholder="Listing Title" data-required>
					</div>
					<div class="form-group">
					    <input type="text" class="form-control" id="description" name="item_description" placeholder="Describe your listing" data-required>
					</div>
					<div class="form-group">
					    <input type="text" class="form-control" id="price" name="item_price" placeholder="Price in decimal" data-required>
					</div>
					<div class="form-group">
					    <input type="text" class="form-control" id="price" name="item_location_city" placeholder="City Name" data-required>
					</div>
					<div class="form-group">
					    <input type="text" class="form-control" id="price" name="item_location_state" placeholder="2 Digit State ID" data-required>
					</div>
					<div class="form-group">
						<label for="image">Image Upload</label>
						<input type="file" id="image" name="image" placeholder="Upload Your Image">
					</div>
					<div class="row">
						<div class="col-sm-6">
							<button type="submit" class="btn btn-primary">Create</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
</div>
