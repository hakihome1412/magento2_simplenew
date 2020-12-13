<?php

namespace Huy\SimpleNew\Controller\Adminhtml\News;

use Huy\SimpleNew\Controller\Adminhtml\News;
use Huy\SimpleNew\Model\NewsFactory;
use Huy\SimpleNew\Model\ResourceModel\NewsFactory as resNewsFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

class MassDelete extends News
{
    protected resNewsFactory $_resNewsFactory;

    public function __construct(Context $context, Registry $coreRegistry, PageFactory $resultPageFactory, NewsFactory $newsFactory, resNewsFactory $resNewsFactory)
    {
        parent::__construct($context, $coreRegistry, $resultPageFactory, $newsFactory);
        $this->_resNewsFactory = $resNewsFactory;
    }

    public function execute()
    {
        $newIds = $this->getRequest()->getParam('news', []);
        $model = $this->_newsFactory->create();
        $resModel = $this->_resNewsFactory->create();
        if(count($newIds)){
            $i = 0;
            foreach ($newIds as $newId) {
                try {
                    $resModel->load($model, $newId);
                    $resModel->delete($model);
                    $i++;
                } catch (\Exception $e) {
                    $this->messageManager->addErrorMessage($e->getMessage());
                }
            }
            if ($i > 0) {
                $this->messageManager->addSuccessMessage(
                    __('A total of %1 item(s) were deleted.', $i)
                );
            }
        } else {
            $this->messageManager->addErrorMessage(
                __('You can not delete item(s), Please check again %1')
            );
        }
        $this->_redirect('*/*/index');
    }
}
