<?php

namespace degordian\frontendController\models;

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
class FrontendMockBuilder
{

    private static $message;
    private static $numberOfIterations;

    public static function getMessage()
    {
        return self::$message;
    }

    public static function getNumberOfIterations()
    {
        return self::$numberOfIterations;
    }

    public static function setMessage($value)
    {
        if (is_string($value) == false) {
            throw new Exception('FrontendMockBuilder::setMessage accepts only string values');
        }
        self::$message = $value;
    }

    public static function setNumberOfIterations($value)
    {
        if ($value < 0) {
            throw new Exception('Number of iterations cannot be negative');
        }
        if (is_integer($value) == false) {
            throw new Exception('FrontendMockBuilder::setNumberOfIterations accepts only integer values');
        }
        self::$numberOfIterations = $value;
    }

    public static function createMock()
    {
        $mock = new FrontendMock();
        $mock->setMessage(self::$message);
        $mock->setNumberOfIterations(self::$numberOfIterations);
        return $mock;
    }
}
