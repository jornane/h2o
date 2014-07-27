<?php namespace yorn\h2o\security;

/**
 * Controller for authentication.
 * 
 * The controller can require authentication,
 *  which will forward unauthenticated users to a page where they can authenticate.
 * It can also check authentication, and hide or show certain GUI elements based on whether the user is authenticated.
 *
 * @author Jørn Åne <i@jornane.no>
 * @copyright Copyright 2014 Jørn Åne
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

interface Authentication {

	/**
	 * Determine whether a user is authenticated,
	 * but take no action.
	 *
	 * This function is ideal for showing or hiding GUI elements.
	 *
	 * @return boolean User is authenticated.
	 */
	function isLoggedIn();

	/**
	 * Determine whether a user is authenticated,
	 *  and forward to login URL if necessary.
	 * This function may therefore not return.
	 *
	 * This function is ideal for checking authentication upon making changes to a Document.
	 */
	function requireLoggedIn();

	/**
	 * Get the URL where unauthenticated users can authenticate themselves.
	 *
	 * @return string URL where unauthenticated users can authenticate themselves
	 */
	function getLoginUrl();

	/**
	 * Remove authentication for the current user.
	 *
	 * This function will never return, as the user is forwarded to either the provided URL,
	 *  or back to the same page.
	 *
	 * @param string $returnUrl URL where user is redirected after being logged out 
	 */
	function logout($returnUrl = null);

}
