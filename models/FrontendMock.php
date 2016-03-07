<?php

namespace degordian\frontendController\models;

use ArrayAccess;
use Countable;
use Iterator;
use Yii;
use yii\base\Exception;

/**
 * @ToDo: Use yii2-faker
 * @ToDo: Allow for further customization of magic attributes and methods
 *
 * Fluent class that is injected in place of missing variables
 *
 * @package degordian\frontendController\models
 */
class FrontendMock implements Iterator, ArrayAccess, Countable
{

    private $iteratorIndex = 0;

    private $message = '';
    private $numberOfIterations = 0;

    public function activeAttributes()
    {
        return [
            'attribute',
        ];
    }

    public function __construct()
    {

    }

    public function setMessage($value)
    {
        if (is_string($value) == false) {
            throw new Exception('setMessage requires a string parameter');
        }
        $this->message = $value;
    }

    public function setNumberOfIterations($value)
    {
        if ($value < 0) {
            throw new Exception('Number of iterations cannot be negative');
        }
        if (is_integer($value) == false) {
            throw new Exception('setNumberOfIterations accepts only integer values');
        }
        if ($this->iteratorIndex > 0) {
            throw new Exception('Changing FrontendMock collection while while iteration over it');
        }
        $this->numberOfIterations = $value;
    }

    public function __get($name)
    {
        return FrontendMockBuilder::createMock();
    }

    public function __call($name, $arguments)
    {
        return FrontendMockBuilder::createMock();
    }

    public function __toString()
    {
        return $this->message;
    }

    /**
     * Return the current element
     *
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        return FrontendMockBuilder::createMock();
    }

    /**
     * Move forward to next element
     *
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        $this->iteratorIndex += 1;
    }

    /**
     * Return the key of the current element
     *
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return FrontendMockBuilder::createMock();
    }

    /**
     * Checks if current position is valid
     *
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        return $this->iteratorIndex < $this->numberOfIterations;
    }

    /**
     * Rewind the Iterator to the first element
     *
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        $this->iteratorIndex = 0;
    }

    /**
     * Whether a offset exists
     *
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     *
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     *
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     * @since 5.0.0
     */
    public function offsetExists($offset)
    {
        return true;
    }

    /**
     * Offset to retrieve
     *
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     *
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     *
     * @return mixed Can return all value types.
     * @since 5.0.0
     */
    public function offsetGet($offset)
    {
        return FrontendMockBuilder::createMock();
    }

    /**
     * Offset to set
     *
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     *
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     *
     * @return void
     * @since 5.0.0
     */
    public function offsetSet($offset, $value)
    {
        return; //no operation
    }

    /**
     * Offset to unset
     *
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     *
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     *
     * @return void
     * @since 5.0.0
     */
    public function offsetUnset($offset)
    {
        return; //no operation
    }

    /**
     * Count elements of an object
     *
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return 5;
    }
}
