<?php

namespace Pawan\ProductAlertApi\Model;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Model\StoreManagerInterface;
use Magento\ProductAlert\Model\StockFactory;

use Pawan\ProductAlertApi\Api\ProductAlertManagementInterface;

class ProductAlert implements ProductAlertManagementInterface
{
    protected $productRepository;
    private $storeManager;
    protected $stockFactory;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        StoreManagerInterface $storeManager,
        StockFactory $stockFactory
    ) {
        $this->productRepository = $productRepository;
        $this->storeManager = $storeManager;
        $this->stockFactory = $stockFactory;
    }
    
    public function addProductAlertStock($customerId, $productId)
    {
        try {
        
            /* @var $product \Magento\Catalog\Model\Product */
            $product = $this->productRepository->getById($productId);
            $store = $this->storeManager->getStore();
            /** @var \Magento\ProductAlert\Model\Stock $model */
            $model = $this->stockFactory->create()
                ->setCustomerId($customerId)
                ->setProductId($product->getId())
                ->setWebsiteId($store->getWebsiteId())
                ->setStoreId($store->getId());
            $model->save();
            return true;
        } catch (NoSuchEntityException $noEntityException) {
            return false;
        }
    } 
    public function deleteProductAlertStock ($customerId, $productId)
    {
        try {
        /* @var $product \Magento\Catalog\Model\Product */
            $product = $this->productRepository->getById($productId);
            $model = $this->stockFactory->create()
                ->setCustomerId($customerId)
                ->setProductId($product->getId())
                ->setWebsiteId(
                    $this->storeManager
                        ->getStore()
                        ->getWebsiteId()
                )->setStoreId(
                    $this->storeManager
                        ->getStore()
                        ->getId()
                )
                ->loadByParam();
            if ($model->getId()) {
                $model->delete();
            }
            return true;
        } catch (NoSuchEntityException $noEntityException) {
            return false;
        }
    }
    
}