<?php


namespace Huy\SimpleNew\Controller\Adminhtml\News;


use Huy\SimpleNew\Controller\Adminhtml\News;

class Grid extends News
{
    public function execute()
    {
        return $this->_resultPageFactory->create();
    }
}
