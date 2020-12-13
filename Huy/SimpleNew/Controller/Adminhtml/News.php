<?php

namespace Huy\SimpleNew\Controller\Adminhtml;

use Huy\SimpleNew\Model\NewsFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

class News extends Action
{
    protected Registry $_coreRegistry;
    protected PageFactory $_resultPageFactory;
    protected NewsFactory $_newsFactory;

    public function __construct(Context $context, Registry $coreRegistry, PageFactory $resultPageFactory, NewsFactory $newsFactory)
    {
        parent::__construct($context);
        $this->_coreRegistry = $coreRegistry;
        $this->_resultPageFactory = $resultPageFactory;
        $this->_newsFactory = $newsFactory;
    }
    public function execute()
    {
    }

    protected function _isAllowed()
    {
        return true;
    }
}
