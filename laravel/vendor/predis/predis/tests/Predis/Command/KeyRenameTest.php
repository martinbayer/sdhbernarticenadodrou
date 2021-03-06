<?php

/*
 * This file is part of the Predis package.
 *
 * (c) Daniele Alessandri <suppakilla@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Predis\Command;

/**
 * @group commands
 * @group realm-key
 */
class KeyRenameTest extends PredisCommandTestCase {
	/**
	 *
	 * @ERROR!!!
	 *
	 */
	protected function getExpectedCommand() {
		return 'Predis\Command\KeyRename';
	}
	
	/**
	 *
	 * @ERROR!!!
	 *
	 */
	protected function getExpectedId() {
		return 'RENAME';
	}
	
	/**
	 * @group disconnected
	 */
	public function testFilterArguments() {
		$arguments = array (
				'key',
				'newkey' 
		);
		$expected = array (
				'key',
				'newkey' 
		);
		
		$command = $this->getCommand ();
		$command->setArguments ( $arguments );
		
		$this->assertSame ( $expected, $command->getArguments () );
	}
	
	/**
	 * @group disconnected
	 */
	public function testParseResponse() {
		$this->assertTrue ( $this->getCommand ()->parseResponse ( true ) );
	}
	
	/**
	 * @group disconnected
	 */
	public function testPrefixKeys() {
		$arguments = array (
				'key',
				'newkey' 
		);
		$expected = array (
				'prefix:key',
				'prefix:newkey' 
		);
		
		$command = $this->getCommandWithArgumentsArray ( $arguments );
		$command->prefixKeys ( 'prefix:' );
		
		$this->assertSame ( $expected, $command->getArguments () );
	}
	
	/**
	 * @group disconnected
	 */
	public function testPrefixKeysIgnoredOnEmptyArguments() {
		$command = $this->getCommand ();
		$command->prefixKeys ( 'prefix:' );
		
		$this->assertSame ( array (), $command->getArguments () );
	}
	
	/**
	 * @group connected
	 */
	public function testRenamesKeys() {
		$redis = $this->getClient ();
		
		$redis->set ( 'foo', 'bar' );
		
		$this->assertTrue ( $redis->rename ( 'foo', 'foofoo' ) );
		$this->assertFalse ( $redis->exists ( 'foo' ) );
		$this->assertTrue ( $redis->exists ( 'foofoo' ) );
	}
	
	/**
	 * @group connected
	 * @expectedException Predis\ServerException
	 * @expectedExceptionMessage ERR no such key
	 */
	public function testThrowsExceptionOnNonExistingKeys() {
		$redis = $this->getClient ();
		
		$redis->rename ( 'foo', 'foobar' );
	}
}
