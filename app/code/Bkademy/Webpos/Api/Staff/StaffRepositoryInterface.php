<?php
/**
 * Created by PhpStorm.
 * User: anhnc
 * Date: 12/03/2017
 * Time: 18:13
 */

namespace Bkademy\Webpos\Api\Staff;

interface StaffRepositoryInterface
{
    /**
     * Retrieve staffs which match a specified criteria.
     *
     * @api
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Bkademy\Webpos\Api\Data\Staff\StaffSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);
    /**
     * Get staff by staff ID.
     * @param int $staffId
     * @return string
     */
    public function getId($staffId);
    /**
     * Get staff by staff ID.
     * @param int $id
     * @return string
     */
    public function test($id);
}