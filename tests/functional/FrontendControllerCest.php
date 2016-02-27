<?php
namespace degordian\yii\codeception;

use Codeception\Util\Locator;
use degordian\frontendController\models\FrontendMockBuilder;

use Symfony\Component\CssSelector\XPath\Translator;

class FrontendControllerCest
{

    const NUMBER_OF_ITERATIONS = 10;
    const NUMBER_OF_VARS = 5;
    const MESSAGE = 'Yiha';

    public function _before(FunctionalNinja $I)
    {
        FrontendMockBuilder::setNumberOfIterations(self::NUMBER_OF_ITERATIONS);
        FrontendMockBuilder::setMessage(self::MESSAGE);
    }

    public function _after(FunctionalNinja $I)
    {
    }

    // tests
    public function tryToTestRawRenderWithDefaultMockValues(FunctionalNinja $I)
    {
        $I->amOnPage(['frontend/main/site/bla']);
        $mockMessage = FrontendMockBuilder::getMessage();
        $locatorH2 = sprintf('//h2[text()=%s]', Translator::getXpathLiteral($mockMessage));
        $locatorLi = sprintf('//li[text()=%s]', Translator::getXpathLiteral($mockMessage));
        $I->seeNumberOfElements($locatorH2, self::NUMBER_OF_VARS);
        $I->seeNumberOfElements($locatorLi, 2 * FrontendMockBuilder::getNumberOfIterations());
    }
}
