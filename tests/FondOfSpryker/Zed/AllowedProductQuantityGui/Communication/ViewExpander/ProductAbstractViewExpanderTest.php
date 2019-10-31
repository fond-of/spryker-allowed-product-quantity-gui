<?php

namespace FondOfSpryker\Zed\AllowedProductQuantityGui\Communication\ViewExpander;

use Codeception\Test\Unit;

class ProductAbstractViewExpanderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\AllowedProductQuantityGui\Communication\ViewExpander\ProductAbstractViewExpander
     */
    protected $productAbstractViewExpander;

    /**
     * @var array
     */
    protected $viewData;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->viewData = [];

        $this->productAbstractViewExpander = new ProductAbstractViewExpander();
    }

    /**
     * @return void
     */
    public function testExpand(): void
    {
        $this->assertSame($this->viewData, $this->productAbstractViewExpander->expand($this->viewData));
    }
}
