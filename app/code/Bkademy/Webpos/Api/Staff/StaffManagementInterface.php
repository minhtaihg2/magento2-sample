<?php

/**
 *  Copyright © 2016 Bkademy. All rights reserved.
 *  See COPYING.txt for license details.
 *
 */
namespace Bkademy\Webpos\Api\Staff;

interface StaffManagementInterface
{

    /**
     * @param \Bkademy\Webpos\Api\Data\Staff\StaffInterface $staff
     * @return int|boolean
     */
    public function login($staff);

    /**
     * 
     * @return int|boolean
     */
    public function logout();

    /**
     * @param \Bkademy\Webpos\Api\Data\Staff\StaffInterface $staff
     * @return string
     */
    public function changepassword($staff);

}
