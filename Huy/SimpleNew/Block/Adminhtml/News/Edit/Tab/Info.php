<?php

namespace Huy\SimpleNew\Block\Adminhtml\News\Edit\Tab;

use Huy\SimpleNew\Model\System\Config\Status;
use Magento\Backend\Block\Template\Context;
use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Cms\Model\Wysiwyg\Config;
use Magento\Framework\Data\FormFactory;
use Magento\Framework\Registry;

class Info extends Generic implements TabInterface
{
    protected Config $_wysiwygConfig;

    protected Status $_status;

    public function __construct(Context $context, Registry $registry, FormFactory $formFactory, Config $wysiwygConfig, Status $status, array $data = [])
    {
        $this->_wysiwygConfig = $wysiwygConfig;
        $this->_status = $status;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('huy_news');

        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('new_');
        $form->setFieldNameSuffix('new');
        // new filed

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('General')]
        );

        if ($model->getId()) {
            $fieldset->addField(
                'id',
                'hidden',
                ['name' => 'id']
            );
        }
        $fieldset->addField(
            'title',
            'text',
            [
                'name'      => 'title',
                'label'     => __('Title'),
                'title' => __('Title'),
                'required' => true
            ]
        );
        $fieldset->addField(
            'image',
            'upload',
            [
                'name'      => 'image',
                'label'     => __('Image'),
                'title' => __('Image'),
            ]
        );
        $fieldset->addField(
            'description',
            'editor',
            [
                'name'      => 'description',
                'label'   => 'Description',
                'config'    => $this->_wysiwygConfig->getConfig(),
                'wysiwyg'   => true,
                'required'  => false
            ]
        );
        $fieldset->addField(
            'status',
            'select',
            [
                'name'      => 'status',
                'label'     => __('Status'),
                'options'   => $this->_status->toOptionArray()
            ]
        );

        $data = $model->getData();
        $form->setValues($data);
        $this->setForm($form);

        return parent::_prepareForm();
    }

    public function getTabLabel()
    {
        return __('News Info');
    }

    public function getTabTitle()
    {
        return __('News Info');
    }

    public function canShowTab()
    {
        return true;
    }

    public function isHidden()
    {
        return false;
    }
}
