<?php

namespace Huy\SimpleNew\Controller\Adminhtml\News;

use Huy\SimpleNew\Controller\Adminhtml\News;
use Huy\SimpleNew\Model\NewsFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

class Index extends News
{
    public function __construct(Context $context, Registry $coreRegistry, PageFactory $resultPageFactory, NewsFactory $newsFactory)
    {
        parent::__construct($context, $coreRegistry, $resultPageFactory, $newsFactory);
    }

    public function execute()
    {
        if ($this->getRequest()->getQuery('ajax')) {
            $this->_forward('grid');
            return;
        }

        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Huy_SimpleNew::simplenew_menu');
        $resultPage->getConfig()->getTitle()->prepend(__('Manage News'));

        return $resultPage;
    }
}
