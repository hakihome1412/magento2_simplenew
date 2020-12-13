<?php


namespace Huy\SimpleNew\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class News extends AbstractDb
{
    protected function _construct()
    {
        // huy_simplenew is table name and id is Primary of Table
        $this->_init('huy_simplenew', 'id');
    }
}
