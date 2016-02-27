<?php
namespace degordian\yii\codeception;


use degordian\frontendController\models\FrontendMockBuilder;
use yii\codeception\TestCase;

class FrontendMockBuilderTest extends TestCase
{
    /**
     * @var \degordian\yii\codeception\UnitNinja
     */
    protected $ninja;

    protected function _after()
    {
        FrontendMockBuilder::setMessage('');
        FrontendMockBuilder::setNumberOfIterations(0);
    }

    public function testMessageGetterSetterWithGoodData()
    {
        $expected = 'ABCDEFG12345';
        FrontendMockBuilder::setMessage($expected);
        $this->ninja->assertEquals($expected, FrontendMockBuilder::getMessage());
    }

    public function testMessageGetterSetterWithInvalidData_ExpectsException()
    {
        $invalidData = 5;
        $this->setExpectedException("Exception");
        FrontendMockBuilder::setMessage($invalidData);
    }

    public function testNumberOfIterationsGetterSetterWithGoodData() {
        $expected = 15;
        FrontendMockBuilder::setNumberOfIterations($expected);
        $this->ninja->assertEquals($expected, FrontendMockBuilder::getNumberOfIterations());
    }

    public function testNumberOfIterationsGetterSetterWithInvalidData_ExpectsException() {
        $invalidData = '';
        $this->setExpectedException("Exception");
        FrontendMockBuilder::setNumberOfIterations($invalidData);
    }

    public function testNumberOfIterationsGetterSetterWithNegativeData_ExpectsException() {
        $invalidData = -5;
        $this->setExpectedException("Exception");
        FrontendMockBuilder::setNumberOfIterations($invalidData);
    }

    public function testCreateMockWithValidData_ExpectsNotNullResult() {
        FrontendMockBuilder::setMessage('Some message');
        FrontendMockBuilder::setNumberOfIterations(10);
        $this->assertNotNull(FrontendMockBuilder::createMock());
    }
}