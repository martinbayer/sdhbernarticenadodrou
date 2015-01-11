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
 *
 * @link http://redis.io/commands/persist
 * @author Daniele Alessandri <suppakilla@gmail.com>
 */
class KeyPersist extends PrefixableCommand {
	/**
	 *
	 * @ERROR!!!
	 *
	 */
	public function getId() {
		return 'PERSIST';
	}
	
	/**
	 *
	 * @ERROR!!!
	 *
	 */
	public function parseResponse($data) {
		return ( bool ) $data;
	}
}
