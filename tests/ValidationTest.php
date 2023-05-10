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
		$this->assertTrue($validation->validate_email( 'Kajol2' ) );
	}
}
