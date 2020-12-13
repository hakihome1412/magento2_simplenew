<?php


namespace Huy\SimpleNew\Block\Adminhtml\News\Edit;

use Magento\Backend\Block\Widget\Tabs as WidgetTabs;

class Tabs extends WidgetTabs
{

    protected function _construct()
    {
        parent::_construct();
        $this->setId('new_edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('New Information'));
    }

    protected function _beforeToHtml()
    {
        $this->addTab(
            'new_info',
            [
                'label' => __('General'),
                'title' => __('General'),
                'content' => $this->getLayout()->createBlock(
                    'Huy\SimpleNew\Block\Adminhtml\News\Edit\Tab\Info'
                )->toHtml(),
                'active' => true
            ]
        );

        return parent::_beforeToHtml();
    }
}
