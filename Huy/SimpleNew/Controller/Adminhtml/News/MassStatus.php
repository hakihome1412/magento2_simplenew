<?php

namespace Huy\SimpleNew\Controller\Adminhtml\News;

use Huy\SimpleNew\Controller\Adminhtml\News;
use Huy\SimpleNew\Model\NewsFactory;
use Huy\SimpleNew\Model\ResourceModel\NewsFactory as resNewsFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

class MassStatus extends News
{
    protected resNewsFactory $_resNewsFactory;

    public function __construct(Context $context, Registry $coreRegistry, PageFactory $resultPageFactory, NewsFactory $newsFactory, resNewsFactory $resNewsFactory)
    {
        parent::__construct($context, $coreRegistry, $resultPageFactory, $newsFactory);
        $this->_resNewsFactory = $resNewsFactory;
    }

    public function execute()
    {
        $status = $this->getRequest()->getParam('status', 0);
        $newIds = $this->getRequest()->getParam('news', []);
        if (count($newIds)) {
            $i = 0;
            foreach ($newIds as $newId) {
                try {
                    $newId = (int)$newId;
                    $model = $this->_newsFactory->create();
                    $resModel = $this->_resNewsFactory->create();
                    $model->setStatus($status)->setId($newId);
                    $resModel->save($model);
                    $i++;
                } catch (\Exception $e) {
                    $this->messageManager->addErrorMessage($e->getMessage());
                }
            }
            if ($i > 0) {
                $this->messageManager->addSuccessMessage(
                    __('A total of %1 item(s) were changed.', $i)
                );
            }
        } else {
            $this->messageManager->addError(
                __('You can not item, Please check again')
            );
        }
        $this->_redirect('*/*/index');
    }
}
