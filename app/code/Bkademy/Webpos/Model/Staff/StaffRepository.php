<?php
namespace Bkademy\Webpos\Model\Staff;
/**
 * Created by PhpStorm.
 * User: anhnc
 * Date: 12/03/2017
 * Time: 18:10
 */
class StaffRepository implements \Bkademy\Webpos\Api\Staff\StaffRepositoryInterface
{
    /**
     * @var \Bkademy\Webpos\Model\ReStaffFactory
     */
    protected $staffFactory;

    /**
     * {@inheritdoc}
     */
    public function __construct(\Bkademy\Webpos\Model\StaffFactory $staffFactory)
    {
        $this->staffFactory = $staffFactory;
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return mixed
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        // TODO: Implement getList() method.
    }

    public function getId($staffId)
    {
        echo $staffId;
        die('nnn');
        return $this->staffFactory->create()->load($staffId);
    }

    public function test($id){
        $staffModel =  $this->staffFactory->create()->load($id);
        return $staffModel->getUsername();
    }

}