<?php

namespace FondOfSpryker\Zed\AllowedProductQuantityGui\Communication;

use FondOfSpryker\Zed\AllowedProductQuantityGui\AllowedProductQuantityGuiDependencyProvider;
use FondOfSpryker\Zed\AllowedProductQuantityGui\Communication\Form\AllowedQuantityForm;
use FondOfSpryker\Zed\AllowedProductQuantityGui\Communication\Form\DataProvider\AllowedQuantityFormDataProvider;
use FondOfSpryker\Zed\AllowedProductQuantityGui\Communication\FormExpander\ProductAbstractFormExpander;
use FondOfSpryker\Zed\AllowedProductQuantityGui\Communication\FormExpander\ProductAbstractFormExpanderInterface;
use FondOfSpryker\Zed\AllowedProductQuantityGui\Communication\TabExpander\ProductAbstractTabExpander;
use FondOfSpryker\Zed\AllowedProductQuantityGui\Communication\TabExpander\ProductAbstractTabExpanderInterface;
use FondOfSpryker\Zed\AllowedProductQuantityGui\Communication\ViewExpander\ProductAbstractViewExpander;
use FondOfSpryker\Zed\AllowedProductQuantityGui\Communication\ViewExpander\ProductAbstractViewExpanderInterface;
use FondOfSpryker\Zed\AllowedProductQuantityGui\Dependency\Facade\AllowedProductQuantityGuiToAllowedProductQuantityFacadeInterface;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;

class AllowedProductQuantityGuiCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return \FondOfSpryker\Zed\AllowedProductQuantityGui\Communication\TabExpander\ProductAbstractTabExpanderInterface
     */
    public function createProductAbstractTabExpander(): ProductAbstractTabExpanderInterface
    {
        return new ProductAbstractTabExpander();
    }

    /**
     * @return \FondOfSpryker\Zed\AllowedProductQuantityGui\Communication\ViewExpander\ProductAbstractViewExpanderInterface
     */
    public function createProductAbstractViewExpander(): ProductAbstractViewExpanderInterface
    {
        return new ProductAbstractViewExpander();
    }

    /**
     * @return \FondOfSpryker\Zed\AllowedProductQuantityGui\Communication\FormExpander\ProductAbstractFormExpanderInterface
     */
    public function createProductAbstractFormExpander(): ProductAbstractFormExpanderInterface
    {
        return new ProductAbstractFormExpander(
            $this->createAllowedQuantityForm(),
            $this->createAllowedQuantityFormDataProvider()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\AllowedProductQuantityGui\Communication\Form\AllowedQuantityForm
     */
    protected function createAllowedQuantityForm(): AllowedQuantityForm
    {
        return new AllowedQuantityForm();
    }

    /**
     * @return \FondOfSpryker\Zed\AllowedProductQuantityGui\Communication\Form\DataProvider\AllowedQuantityFormDataProvider
     */
    protected function createAllowedQuantityFormDataProvider(): AllowedQuantityFormDataProvider
    {
        return new AllowedQuantityFormDataProvider($this->getAllowedProductQuantityFacade());
    }

    /**
     * @return \FondOfSpryker\Zed\AllowedProductQuantityGui\Dependency\Facade\AllowedProductQuantityGuiToAllowedProductQuantityFacadeInterface
     */
    protected function getAllowedProductQuantityFacade(): AllowedProductQuantityGuiToAllowedProductQuantityFacadeInterface
    {
        return $this->getProvidedDependency(AllowedProductQuantityGuiDependencyProvider::FACADE_ALLOWED_PRODUCT_QUANTITY);
    }
}
