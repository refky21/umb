<?php
// check if hashed password is SHA1 and update as necessary, see function comments
add_filter( 'check_password', 'check_sha1_password', 10, 4 );
/** 
 * Check if a user has a SHA1 password hash, allows login if password hashes match, then updates password hash to wp format 
 * 
 * Hooks into check_password filter, mostly copied from md5 upgrade function with pluggable.php/wp_check_password
 *
 * @param string $check
 * @param string $password
 * @param string $hash
 * @param string $user_id
 * @return results of sha1 hash comparison, or $check if $password is not a SHA1 hash
 */
function check_sha1_password( $check, $password, $hash, $user_id ) {
	if( is_sha1( $hash ) ) {
		$check = ( $hash == sha1( $password ) );
		if ( $check && $user_id ) {
			// Rehash using new proper WP hash
			wp_set_password( $password, $user_id );
			$hash = wp_hash_password( $password );
			// Allow login
			return true;
		} else {
			// SHA1 hash in db, but SHA1 has of provided $password did not match. Do not allow login.
			return false;
		}
	}
	//not SHA1 password, so return what was passed
	return $check;
}
/**
* Check if provided string is a SHA1 hash
*/
function is_sha1( $str ) {
	return ( bool ) preg_match( '/^[0-9a-f]{40}$/i', $str );
}
?>