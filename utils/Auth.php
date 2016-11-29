<?php

require_once 'Log.php';
require_once '../models/User.php';

class Auth
{

	// runs login attempt with parameters
	public static function attempt($username, $password)
	{

		// makes sure the values passed in are not empty
		if(($username == '' || $username == null) || ($password == '' || $password == null))
		{

			$_SESSION['ERROR_MESSAGE'] = 'Login information was incorrect';
			return false;
		}

		// gets instance of user model by searching with username or email($username)
		$user = User::findByUsernameOrEmail($username);

		// makes sure the instance returned is not empty
		if ($user == null)
		{

			$_SESSION['ERROR_MESSAGE'] = 'Login information was incorrect';
			return false;
		}

		// checks password submitted against hashed password
		if (password_verify($password, $user->password))
		{

			// sets session variables used for logged in user
			$_SESSION['IS_LOGGED_IN'] = $user->username;
			$_SESSION['LOGGED_IN_ID'] = $user->id;

			return true;
		}

		$_SESSION['ERROR_MESSAGE'] = 'Login information was incorrect';
		return false;
	}

	// checks session to see if user is logged in
	public static function check()
	{

		return (isset($_SESSION['IS_LOGGED_IN']) && $_SESSION['IS_LOGGED_IN'] != '');
	}

	// returns id of the currently logged in user
	public static function id()
	{

		if (Auth::check())
		{

			return $_SESSION['LOGGED_IN_ID'];
		}

		return null;
	}

	// returns instance of the user model for the user that is currently logged in
	public static function user()
	{

		if (self::check())
		{

			return User::findByUsernameOrEmail($_SESSION['IS_LOGGED_IN']);
		}

		return null;
	}

	// clears session variables(logs out user)
	public static function logout()
	{
	    // clear $_SESSION array
   		session_unset();

	    // delete session data on the server
	    session_destroy();

	    // ensure client is sent a new session cookie
	    session_regenerate_id();

	    // start a new session - session_destroy() ended our previous session so
	    // if we want to store any new data in $_SESSION we must start a new one
    	session_start();
    	header ('Location: ../ads.php');
    

	    return true;
	}

	public static function postedBy()
	{
		$listing = Listing::find(Input::get('id'));

		return $listing->attributes['user_id'] == self::id();
	}
}

?>