<?php
/**
 * Validation Class.
 * @package php/todo
 */
namespace Todo;

/**
 * Validate User Inputs.
 *
 * @since 1.0.0
 */
class Validation {
	public function validate_email( $email ) {
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
		} else {
			return false;
		}
	}

	public function validate_password( $password1, $password2 ) {
		if( $password1 === $password2) {
			return true;
		} else {
			return false;
		}
	}
}
