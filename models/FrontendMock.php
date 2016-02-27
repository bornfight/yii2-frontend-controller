<?php

namespace degordian\frontendController\models;

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
class FrontendMock implements Iterator
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
            throw new Exception('FrontendMockBuilder::setMessage accepts only string values');
        }
        $this->message = $value;
    }

    public function setNumberOfIterations($value)
    {
        if ($value < 0) {
            throw new Exception('Number of iterations cannot be negative');
        }
        if (is_integer($value) == false) {
            throw new Exception('FrontendMockBuilder::setNumberOfIterations accepts only integer values');
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
}
