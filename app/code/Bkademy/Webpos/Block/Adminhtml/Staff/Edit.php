<?php
namespace Bkademy\Webpos\Block\Adminhtml\Staff;

class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    protected $_coreRegistry = null;

    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    protected function _construct()
    {
        $this->_objectId = 'id';
        // khoi tao block Group va _controller để gọi trong _preparelayout trong lớp cha
        $this->_blockGroup = 'Bkademy_Webpos';
        $this->_controller = 'adminhtml_staff';

        parent::_construct();

        $this->buttonList->update('save', 'label', __('Save'));
        $this->buttonList->update('delete', 'label', __('Delete'));
        $this->buttonList->add(
            'saveandcontinue',
            array(
                'label' => __('Save and Continue Edit'),
                'class' => 'save',
                'data_attribute' => array(
                    'mage-init' => array('button' => array('event' => 'saveAndContinueEdit', 'target' => '#edit_form'))
                )
            ),
            -100
        );
        if($this->getRequest()->getParam('staff_id')){
            $this->buttonList->add(
                'delete',
                [
                    'label' => __('Delete'),
                    'onclick' => 'deleteConfirm(' . json_encode(__('Are you sure you want to delete this Staff?'))
                        . ','
                        . json_encode($this->getDeleteUrl())
                        . ')',
                    'class' => 'scalable delete',
                    'level' => -1
                ]
            );

        }

    }

    public function getHeaderText()
    {
        if ($this->_coreRegistry->registry('current_user')->getId()) {
            return __("Edit Staff '%1'", $this->escapeHtml($this->_coreRegistry->registry('current_staff')->getData('display_name')));
        } else {
            return __('New Staff');
        }
    }
    public function getDeleteUrl()
    {
        $params = array('staff_id' => $this->getRequest()->getParam('staff_id'));
        return $this->getUrl('*/*/delete', $params);
    }
}

