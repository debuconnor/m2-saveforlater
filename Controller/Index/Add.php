<?php
namespace Debuconnor\SaveForLater\Controller\Index;

class Add extends \Magento\Wishlist\Controller\Index\Add
{
    public function execute()
    {
        // Get the wishlist item
        $wishlist = $this->wishlistProvider->getWishlist();
        $productId = $this->getRequest()->getParam('product');
        $product = $this->productRepository->getById($productId);
        $buyRequest = new \Magento\Framework\DataObject($this->getRequest()->getParams());

        $wishlistItem = $wishlist->addNewItem($product, $buyRequest);
        
        // Set the "save for later" flag
        $wishlistItem->setWishlistItemId(null);
        $wishlistItem->setParentItemId($wishlistItem->getId());
        $wishlistItem->setBuyRequest($buyRequest->getData());
        $wishlistItem->save();
        
        // Remove the item from the wishlist
        $itemId = $this->getRequest()->getParam('item');
        $wishlist->removeItem($itemId)->save();

        // Redirect to the wishlist page
        $this->_redirect('wishlist/index/index');
    }
}
