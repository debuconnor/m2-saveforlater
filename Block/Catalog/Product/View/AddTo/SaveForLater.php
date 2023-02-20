<?php
namespace Debuconnor\SaveForLater\Block\Catalog\Product\View\AddTo;

class SaveForLater extends \Magento\Wishlist\Block\Catalog\Product\View\AddTo\Wishlist
{
    public function getSaveForLaterUrl()
    {
        return $this->getUrl('wishlist/index/add', ['item' => $this->getItem()->getId()]);
    }
}
