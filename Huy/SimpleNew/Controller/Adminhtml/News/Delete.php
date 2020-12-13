<?php


namespace Huy\SimpleNew\Controller\Adminhtml\News;


use Huy\SimpleNew\Controller\Adminhtml\News;

class Delete extends News
{
    public function execute()
    {
        $newId = (int) $this->getRequest()->getParam('id');

        if ($newId) {
            $newModel = $this->_newsFactory->create();
            $newModel->load($newId);

            // Check this news exists or not
            if (!$newModel->getId()) {
                $this->messageManager->addError(__('This news no longer exists.'));
            } else {
                try {
                    // Delete news
                    $newModel->delete();
                    $this->messageManager->addSuccess(__('The news has been deleted.'));

                    // Redirect to grid page
                    $this->_redirect('*/*/');
                    return;
                } catch (\Exception $e) {
                    $this->messageManager->addError($e->getMessage());
                    $this->_redirect('*/*/edit', ['id' => $newModel->getId()]);
                }
            }
        }
    }
}
