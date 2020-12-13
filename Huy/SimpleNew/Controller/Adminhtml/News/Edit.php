<?php

namespace Huy\SimpleNew\Controller\Adminhtml\News;

use Huy\SimpleNew\Controller\Adminhtml\News;

class Edit extends News
{
    public function execute()
    {
        $newId = $this->getRequest()->getParam('id');

        $model = $this->_newsFactory->create();

        if ($newId) {
            $model->load($newId);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This news no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }

        // Restore previously entered form data from session
        $data = $this->_session->getNewsData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        $this->_coreRegistry->register('huy_news', $model);

        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Huy_SimpleNew::simplenew_menu');
        $resultPage->getConfig()->getTitle()->prepend(__('New Information'));

        return $resultPage;
    }
}
