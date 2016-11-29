<?php


if(Input::get('name') != '' &&
Input::get('email') != '' &&
Input::get('username') != '' &&
Input::get('password') != ''){

$name = Input::get('name');
$email = Input::get('email');
$username = Input::get('username');
$password = Input::get('password');

$user = new User();
$user->name = $name;
$user->email = $email;
$user->username = $username;
$user->password = $password;
$user->save();

}
?>

<div class="container view">
	<section id="login">
		<div class="row">
			<h1 class="section-title">Signup For KirkZay</h1>

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
					    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" data-required>
					</div>
					<div class="form-group">
					    <input type="text" class="form-control" id="email" name="email" placeholder="Email" data-required>
					</div>
					<div class="form-group">
					    <input type="text" class="form-control" id="username" name="username" placeholder="Username" data-required>
					</div>
					<div class="form-group">
					    <input type="password" class="form-control" id="password" name="password" placeholder="Password" data-required>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<button type="submit" class="btn btn-primary">Signup</button>
						</div>
						<div class="col-sm-6 text-right">
							<a href='/login' class="btn btn-success">Go To Login</a>
						</div>
					</div>

				</form>

			</div>

		</div>
	</section>
</div>