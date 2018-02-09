<?php
/**
 * WHIP libary test file.
 *
 * @package Yoast\WHIP
 */

class MessagesManagerTest extends PHPUnit_Framework_TestCase {
	public function testHasMessages() {
		$manager = new Whip_MessagesManager();

		$this->assertFalse( $manager->hasMessages() );

		$GLOBALS['whip_messages'][] = 'I am a test message';

		$this->assertTrue( $manager->hasMessages() );

	}
}
