<?php

namespace FondOfSpryker\Zed\AllowedProductQuantityGui\Dependency\Facade;

use FondOfSpryker\Zed\AllowedProductQuantity\Business\AllowedProductQuantityFacadeInterface;
use Generated\Shared\Transfer\AllowedProductQuantityResponseTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;

class AllowedProductQuantityGuiToAllowedProductQuantityFacadeBridge implements AllowedProductQuantityGuiToAllowedProductQuantityFacadeInterface
{
    /**
     * @var \FondOfSpryker\Zed\AllowedProductQuantity\Business\AllowedProductQuantityFacadeInterface
     */
    protected $allowedProductQuantityFacade;

    /**
     * @param \FondOfSpryker\Zed\AllowedProductQuantity\Business\AllowedProductQuantityFacadeInterface $allowedProductQuantityFacade
     */
    public function __construct(AllowedProductQuantityFacadeInterface $allowedProductQuantityFacade)
    {
        $this->allowedProductQuantityFacade = $allowedProductQuantityFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\AllowedProductQuantityResponseTransfer
     */
    public function findProductAbstractAllowedQuantity(
        ProductAbstractTransfer $productAbstractTransfer
    ): AllowedProductQuantityResponseTransfer {
        return $this->allowedProductQuantityFacade->findProductAbstractAllowedQuantity($productAbstractTransfer);
    }
}
