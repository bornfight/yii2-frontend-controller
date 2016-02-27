<?php
namespace degordian\yii\codeception;


use degordian\frontendController\models\FrontendMock;
use degordian\frontendController\models\FrontendMockBuilder;
use yii\codeception\TestCase;

class FrontendMockTest extends TestCase
{
    /**
     * @var \degordian\yii\codeception\UnitNinja
     */
    protected $ninja;

    /**
     * @var FrontendMock
     */
    private $mockModel;

    const MESSAGE = 'Master of orion';
    const ITERATIONS = 5;

    protected function _before()
    {
        FrontendMockBuilder::setMessage(self::MESSAGE);
        FrontendMockBuilder::setNumberOfIterations(self::ITERATIONS);
        $this->mockModel = FrontendMockBuilder::createMock();
    }

    public function testMagicGetMethod_ExpectsResultToBeOfTypeFrontendMock()
    {
        $this->ninja->amGoingTo('Call a non-existing attribute on the mock and expect to get the mock as a result');
        $child = $this->mockModel->doesnotexist;
        $this->assertInstanceOf('degordian\frontendController\models\FrontendMock', $child);
    }

    public function testMagicCallMethod_ExpectsResultToBeOfTypeFrontendMock()
    {
        $this->ninja->amGoingTo('Call a non-existing method on the mock and expect to get the mock as a result');
        $child = $this->mockModel->doesnotexist();
        $this->assertInstanceOf('degordian\frontendController\models\FrontendMock', $child);
    }

    public function testToString()
    {
        $this->assertEquals(self::MESSAGE, (string)$this->mockModel);
    }

    public function testIteratorInterface_ExpectsCorrectNumberOfLoops()
    {
        $this->ninja->amGoingTo('Loop over the collection and verify the number of executed loops');
        $iterationCount = 0;
        foreach ($this->mockModel as $key => $value) {
            $iterationCount += 1;
        }
        $this->assertEquals(self::ITERATIONS, $iterationCount);
    }

    public function testIteratorInterface_ExpectsKeyValuePairsToBeOfTypeFrontendMock()
    {
        foreach ($this->mockModel as $key => $value) {
            $this->assertInstanceOf('degordian\frontendController\models\FrontendMock', $key);
            $this->assertInstanceOf('degordian\frontendController\models\FrontendMock', $value);
        }
    }

    public function testIteratorInterface_ChangingCollectionSizeWhileIterating_ExpectsException() {
        $this->ninja->amGoingTo('Change the collection size while iterating over it');
        $this->setExpectedException('Exception');
        foreach ($this->mockModel as $item) {
            $this->mockModel->setNumberOfIterations(10);
        }
    }

    public function testMockBuilderChild_MagicGetMethod_ExpectsResultToBeInitialized()
    {
        $child = $this->mockModel->foo;
        $this->ninja->assertNotSame($this->mockModel, $child); //different objects in memory
        $this->assertEquals($this->mockModel, $child); //but with the same values
    }

    public function testMockBuilderChild_MagicCallMethod_ExpectsResultToBeInitialized()
    {
        $child = $this->mockModel->foo();
        $this->ninja->assertNotSame($this->mockModel, $child); //different objects in memory
        $this->assertEquals($this->mockModel, $child); //but with the same values
    }

    public function testMockBuilderOnMagicGetMethod_ExpectsForeachTo()
    {
        $this->ninja->amGoingTo('See if __get() created a good mock object with a valid message');
        $child = $this->mockModel->foo();
        $this->assertEquals(self::MESSAGE, (string)$child);
    }
}