<?php

namespace Todo;

use PHPUnit\Framework\TestCase;

final class ValidationTest extends TestCase
{
    public function testValidateEmail() {
		$validation = new Validation();
		$this->assertTrue($validation->validate_email( 'milanmalla2015@gmail.com' ) );
		$this->assertTrue($validation->validate_email( 'sukhdeep@gmail.com' ) );
		$this->assertFalse($validation->validate_email( 'niruta@gmail' ) );
		$this->assertFalse($validation->validate_email( 'Kajol' ) );
	}

	public function testPasswordConfirmation() {
		$validation = new Validation();
		$this->assertTrue($validation->validate_password( '1235252@1122', '1235252@1122' ) );
		$this->assertTrue($validation->validate_password( 'milanmalla2015@gmail.com', 'milanmalla2015@gmail.com' ) );
		$this->assertFalse($validation->validate_password( 'niruta@gmail', 'niruta@gmail12' ) );
		$this->assertFalse($validation->validate_password( 'niruta@gmail', 'niruta@gmail12' ) );
	}
}
