<?php


namespace Huy\SimpleNew\Model;

use Magento\Framework\Model\AbstractModel;

class News extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Huy\SimpleNew\Model\ResourceModel\News');
    }
}
