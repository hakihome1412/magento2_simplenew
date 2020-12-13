<?php


namespace Huy\SimpleNew\Model\ResourceModel\News;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            'Huy\SimpleNew\Model\News',
            'Huy\SimpleNew\Model\ResourceModel\News'
        );
    }
}
