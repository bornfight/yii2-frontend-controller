<?php

namespace degordian\frontendController\models;

use Iterator;
use Yii;

/**
 * @ToDo: Use yii2-faker
 *
 * Fluent class that is injected in place of missing variables
 *
 * @package degordian\frontendController\models
 */
class FrontendMock implements Iterator
{

    private $iteratorIndex = 0;

    public function activeAttributes()
    {
        return [
            'atr',
        ];
    }

    public function __construct()
    {
        //$this->faker = Faker\Factory::create();
    }

    public function __get($name)
    {
        return new FrontendMock();
    }

    public function __call($name, $arguments)
    {
        return new FrontendMock();
    }

    public function __toString()
    {
        return 'Hello from FrontendMock';
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
        return new FrontendMock();
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
        return new FrontendMock();
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
        return $this->iteratorIndex < 5;
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
