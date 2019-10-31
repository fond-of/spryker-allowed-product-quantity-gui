<?php

namespace FondOfSpryker\Zed\AllowedProductQuantityGui\Communication;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\AllowedProductQuantityGui\AllowedProductQuantityGuiDependencyProvider;
use FondOfSpryker\Zed\AllowedProductQuantityGui\Communication\FormExpander\ProductAbstractFormExpanderInterface;
use FondOfSpryker\Zed\AllowedProductQuantityGui\Communication\TabExpander\ProductAbstractTabExpanderInterface;
use FondOfSpryker\Zed\AllowedProductQuantityGui\Communication\ViewExpander\ProductAbstractViewExpanderInterface;
use FondOfSpryker\Zed\AllowedProductQuantityGui\Dependency\Facade\AllowedProductQuantityGuiToAllowedProductQuantityFacadeInterface;
use Spryker\Zed\Kernel\Container;

class AllowedProductQuantityGuiCommunicationFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\AllowedProductQuantityGui\Communication\AllowedProductQuantityGuiCommunicationFactory
     */
    protected $allowedProductQuantityGuiCommunicationFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\AllowedProductQuantityGui\Dependency\Facade\AllowedProductQuantityGuiToAllowedProductQuantityFacadeInterface
     */
    protected $allowedProductQuantityGuiToAllowedProductQuantityFacadeInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->allowedProductQuantityGuiToAllowedProductQuantityFacadeInterfaceMock = $this->getMockBuilder(AllowedProductQuantityGuiToAllowedProductQuantityFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->allowedProductQuantityGuiCommunicationFactory = new AllowedProductQuantityGuiCommunicationFactory();
        $this->allowedProductQuantityGuiCommunicationFactory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testCreateProductAbstractTabExpander(): void
    {
        $this->assertInstanceOf(ProductAbstractTabExpanderInterface::class, $this->allowedProductQuantityGuiCommunicationFactory->createProductAbstractTabExpander());
    }

    /**
     * @return void
     */
    public function testCreateProductAbstractFormExpander(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(AllowedProductQuantityGuiDependencyProvider::FACADE_ALLOWED_PRODUCT_QUANTITY)
            ->willReturn($this->allowedProductQuantityGuiToAllowedProductQuantityFacadeInterfaceMock);

        $this->assertInstanceOf(ProductAbstractFormExpanderInterface::class, $this->allowedProductQuantityGuiCommunicationFactory->createProductAbstractFormExpander());
    }

    /**
     * @return void
     */
    public function testCreateProductAbstractViewExpander(): void
    {
        $this->assertInstanceOf(ProductAbstractViewExpanderInterface::class, $this->allowedProductQuantityGuiCommunicationFactory->createProductAbstractViewExpander());
    }
}
