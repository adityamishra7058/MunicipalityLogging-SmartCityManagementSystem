<?php
	function login_admin($aid)
	{
		session_regenerate_id();
		//protects from session fixation
		$_SESSION['aid']=$aid;
		return true;

	}

	function login_staff($sid)
	{
		session_regenerate_id();
		//protects from session fixation
		$_SESSION['sid']=$sid;
		return true;

	}

	function log_out_admin()
	{
		unset($_SESSION['aid']);
		return true;
	}

	function log_out_staff()
	{
		unset($_SESSION['sid']);
		return true;
	}

	function is_logged_in_admin()
	{
		return isset($_SESSION['aid']);
	}

	function is_logged_in_staff()
	{
		return isset($_SESSION['sid']);
	}

	function require_login_admin()
	{
		if(!is_logged_in_admin())
		{
      redirect_to(url_for('/general/login_option.php'));
		}
	}

	function require_login_staff()
	{
		if(!is_logged_in_staff())
		{
			redirect_to(url_for('/general/login_option.php'));
		}
	}
?>
