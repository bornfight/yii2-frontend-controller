<?php

namespace degordian\frontendController\models;

use Yii;

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
        self::$message = $value;
    }

    public static function setNumberOfIterations($value)
    {
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
