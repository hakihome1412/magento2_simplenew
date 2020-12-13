<?php

namespace Huy\SimpleNew\Controller\News;

use Huy\SimpleNew\Model\NewsFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected PageFactory $_pageFactory;
    protected NewsFactory $_newsFactory;

    public function __construct(Context $context, PageFactory $pageFactory, NewsFactory $newsFactory)
    {
        $this->_pageFactory = $pageFactory;
        $this->_newsFactory = $newsFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $resultPageFactory = $this->_pageFactory->create();

        $resultPageFactory->getConfig()->getTitle()->set(__('News List'));

        if ($resultPageFactory->getLayout()->getBlock('breadcrumbs')) {
            $breadcrumbs = $resultPageFactory->getLayout()->getBlock('breadcrumbs');
            $breadcrumbs->addCrumb(
                'home',
                [
                    'label' => __('Home'),
                    'title' => __('Home'),
//                    'link' => $this->_url->getUrl('')
                ]
            );
            $breadcrumbs->addCrumb(
                'news',
                [
                    'label' => __('News'),
                    'title' => __('News')
                ]
            );
        }
        return $resultPageFactory;
    }
}
