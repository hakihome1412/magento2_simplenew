<?php

namespace Huy\SimpleNew\Block\Adminhtml\Renderer;

use Magento\Backend\Block\Context;
use Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer;
use Magento\Framework\DataObject;
use Magento\Framework\UrlInterface;
use Magento\Store\Model\StoreManagerInterface;

class Image extends AbstractRenderer
{
    protected StoreManagerInterface $storeManager;
    public function __construct(Context $context, StoreManagerInterface $storeManager, array $data = [])
    {
        parent::__construct($context, $data);
        $this->storeManager = $storeManager;
    }
    public function render(DataObject $row)
    {
        $image = $this->_getValue($row);
        $mediaUrl = $this->storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA);
        $strImage = '<img width="100" height="100" src="' . $mediaUrl . 'simplenew/images/' . $image . '" />';

        return $strImage;
    }
}
