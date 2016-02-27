<?php

namespace degordian\frontendController\renderer;

use degordian\frontendController\models\FrontendMockBuilder;
use yii;

class FrontendRenderer extends yii\base\ViewRenderer
{

    const UNDEFINED_VARIABLE_PATTERN = '/Undefined variable: (.+)/';
    const CALL_LIMIT = 100;

    private $isPhp7;

    public function init()
    {
        $this->isPhp7 = phpversion()[0] == "7";
    }

    public function render($view, $file, $params)
    {
        $remainingCalls = self::CALL_LIMIT;
        if ($this->isPhp7 == false) {
            set_error_handler($this->errorToExceptionHandler()); //convert errors to exceptions
        }
        while ($remainingCalls > 0) {
            try {
                $output = $view->renderPhpFile($file, $params);
                if ($this->isPhp7 == false) {
                    restore_error_handler(); //give control back to the default error handler
                }
                return $output;
            } catch (\Exception $ex) {
                ob_get_clean(); //flush all accumulated junk from renderPhpFile
                $matches = [];
                if (preg_match(self::UNDEFINED_VARIABLE_PATTERN, $ex->getMessage(), $matches)) {
                    $variableName = $matches[1];
                    $params[$variableName] = FrontendMockBuilder::createMock();
                } else {
                    //This is a real exception that we can't handle. Rethrow
                    throw $ex;
                }
            }
            $remainingCalls -= 1;
        }
        throw new yii\base\Exception('FrontendRenderer::render reached max call limit');
    }

    private function errorToExceptionHandler()
    {
        return function ($errno, $errstr) {
            throw new \ErrorException($errstr, 0, $errno);
        };
    }
}