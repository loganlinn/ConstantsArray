<?php

/**
 * ConstantsArray <https://github.com/loganlinn/ConstantsArray>
 *
 * A simple array-like PHP class for using constants in strings
 * 
 * (c) Logan Linn <logan@loganlinn.com>
 *
 * For the full copyright and license information, please view the 
 * LICENSE file that was distributed with this source code.
 */
class ConstantsArray implements ArrayAccess {
	/**
	 * Indicate if a constant is defined
	 *
	 * @param string
	 * @return bool
	 */
	public function offsetExists($offset) {
		return defined($offset);
	}

	/**
	 * Returns value for constant if it's defined
	 *
	 * @param string
	 * @return mixed
	 */
	public function offsetGet($offset) {
		return constant($offset);
	}

	/**
	 * @param string
	 * @param mixed
	 * @throws LogicException
	 */
	public function offsetSet($offset, $value) {
		// This is no place to define()
		throw new LogicException('Cannot set constants from ' . __CLASS__);
	}

	/**
	 * @param string
	 * @throws LogicException
	 */
	public function offsetUnset($offset) {
		// Constants can't be unset, silly!
		throw new LogicException('Cannot unset constants from ' . __CLASS__);
	}
}
