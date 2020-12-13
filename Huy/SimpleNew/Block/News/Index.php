<?php

namespace Huy\SimpleNew\Block\News;

use Huy\SimpleNew\Model\NewsFactory;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Index extends Template
{
    protected NewsFactory $_newsFactory;

    public function __construct(Context $context, NewsFactory $newsFactory)
    {
        $this->_newsFactory = $newsFactory;
        parent::__construct($context);
    }

    public function getPostItems()
    {
        $news = $this->_newsFactory->create();

        return $news->getCollection();
    }
}
