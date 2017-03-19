<?php
/**
 *  Copyright © 2016 Magestore. All rights reserved.
 *  See COPYING.txt for license details.
 *
 */

namespace Bkademy\Webpos\Controller\Adminhtml\Staff;

/**
 * class \Magestore\Webpos\Controller\Adminhtml\Staff\Staff\Save
 *
 * Save user
 * Methods:
 *  execute
 *
 * @category    Magestore
 * @package     Magestore\Webpos\Controller\Adminhtml\Staff\Staff
 * @module      Webpos
 * @author      Magestore Developer
 */
/**
 * Class Save
 * @package Magestore\Webpos\Controller\Adminhtml\Staff\Staff
 */
class Save extends \Bkademy\Webpos\Controller\Adminhtml\Staff
{

    /**
     * @return $this
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $modelId = (int)$this->getRequest()->getParam('user_id');
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            return $resultRedirect->setPath('*/*/');
        }

        if ($modelId) {
            $model = $this->_objectManager->create('Bkademy\Webpos\Model\Staff')
                ->load($modelId);
        } else {
            $model = $this->_objectManager->create('Bkademy\Webpos\Model\Staff');
        }

        $model->setData($data);
        
        if ($model->hasNewPassword() && $model->getNewPassword() === '') {
            $model->unsNewPassword();
        }

        if ($model->hasPasswordConfirmation() && $model->getPasswordConfirmation() === '') {
            $model->unsPasswordConfirmation();
        }

        $result = $model->validate(); /* validate data */
  
        if (is_array($result)) {
            foreach ($result as $message) {
                $this->messageManager->addError($message);
            }
            $this->_redirect('*/*/edit', array('_current' => true));
            return $resultRedirect->setPath('*/*/');
        }

        try {
            $model->setData('customer_group', implode(',', $model->getData('customer_group')));
            $model->save();
            $this->messageManager->addSuccess(__('Staff was successfully saved'));
        }catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
            return  $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('staff_id')]);
        }
        if ($this->getRequest()->getParam('back') == 'edit') {
            return  $resultRedirect->setPath('*/*/edit', ['id' =>$model->getId()]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}