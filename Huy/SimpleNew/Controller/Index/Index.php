<?php
namespace Huy\SimpleNew\Controller\Index;

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
        $news = $this->_newsFactory->create();
        $collection = $news->getCollection();
        foreach ($collection as $item) {
            echo "<pre>";
            print_r($item->getData());
            echo "</pre>";
        }
        exit();
        return $this->_pageFactory->create();
    }
}
