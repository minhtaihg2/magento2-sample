<?php
/**
 * Created by PhpStorm.
 * User: anhnc
 * Date: 06/03/2017
 * Time: 22:01
 */

namespace Bkademy\Webpos\Controller\Adminhtml\Staff;
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Bkademy\Webpos\Model\ResourceModel\Staff\CollectionFactory;

class changePassword extends Action
{
    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @param Context $context
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(Context $context, Filter $filter, CollectionFactory $collectionFactory)
    {

        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $collectionSize = $collection->getSize();
//        foreach ($collection as $staff){
//            $id =
//        }
        \Zend_Debug::dump($collection->getData());die;
        $id = $this->getRequest()->getParam('staff_id');
        $resultRedirect = $this->resultRedirectFactory->create();
        $model = $this->_objectManager->create('Bkademy\Webpos\Model\Staff');

        $registryObject = $this->_objectManager->get('Magento\Framework\Registry');

        if ($id) {
            $model = $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This staff no longer exists.'));
                return $resultRedirect->setPath('webpos/*/', ['_current' => true]);
            }
        }
        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        $registryObject->register('current_staff', $model);
        $resultPage = $this->_resultPageFactory->create();
        if (!$model->getId()) {
            $pageTitle = __('New Staff');
        } else {
            $pageTitle = __('Edit Staff %1', $model->getDisplayName());
        }
        $resultPage->getConfig()->getTitle()->prepend($pageTitle);
        return $resultPage;
    }
}