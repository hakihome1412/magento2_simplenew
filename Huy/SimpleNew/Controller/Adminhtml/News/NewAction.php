<?php


namespace Huy\SimpleNew\Controller\Adminhtml\News;

use Huy\SimpleNew\Controller\Adminhtml\News;

class NewAction extends News
{

    public function execute()
    {
        $this->_forward('edit');
    }
}
