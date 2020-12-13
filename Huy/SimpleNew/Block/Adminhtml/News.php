<?php


namespace Huy\SimpleNew\Block\Adminhtml;


use Magento\Backend\Block\Widget\Grid\Container;

class News extends Container
{
    protected function _construct()
    {
        $this->_controller = 'adminhtml_news';
        $this->_blockGroup = 'Huy_SimpleNew';
        $this->_headerText = __('Manage News');
        $this->_addButtonLabel = __('Add New');
        parent::_construct();
    }
}
