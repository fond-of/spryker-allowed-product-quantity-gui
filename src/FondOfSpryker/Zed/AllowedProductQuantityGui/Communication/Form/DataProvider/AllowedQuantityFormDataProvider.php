<?php

namespace FondOfSpryker\Zed\AllowedProductQuantityGui\Communication\Form\DataProvider;

use FondOfSpryker\Zed\AllowedProductQuantityGui\Dependency\Facade\AllowedProductQuantityGuiToAllowedProductQuantityFacadeInterface;
use Generated\Shared\Transfer\ProductAbstractTransfer;

class AllowedQuantityFormDataProvider
{
    /**
     * @var \FondOfSpryker\Zed\AllowedProductQuantityGui\Dependency\Facade\AllowedProductQuantityGuiToAllowedProductQuantityFacadeInterface
     */
    protected $allowedProductQuantityFacade;

    /**
     * @param \FondOfSpryker\Zed\AllowedProductQuantityGui\Dependency\Facade\AllowedProductQuantityGuiToAllowedProductQuantityFacadeInterface $allowedProductQuantityFacade
     */
    public function __construct(AllowedProductQuantityGuiToAllowedProductQuantityFacadeInterface $allowedProductQuantityFacade)
    {
        $this->allowedProductQuantityFacade = $allowedProductQuantityFacade;
    }

    /**
     * @param int|null $idProductAbstract
     *
     * @return array
     */
    public function getOptions(?int $idProductAbstract = null): array
    {
        if ($idProductAbstract === null) {
            return [];
        }

        $productAbstractTransfer = (new ProductAbstractTransfer())->setIdProductAbstract($idProductAbstract);

        $allowedProductQuantityResponseTransfer = $this->allowedProductQuantityFacade
            ->findProductAbstractAllowedQuantity($productAbstractTransfer);

        if ($allowedProductQuantityResponseTransfer->getIsSuccessful() === false) {
            return [];
        }

        $allowedProductQuantityTransfer = $allowedProductQuantityResponseTransfer->getAllowedProductQuantityTransfer();

        return $allowedProductQuantityTransfer->toArray();
    }
}
