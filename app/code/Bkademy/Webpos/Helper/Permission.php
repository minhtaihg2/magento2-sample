<?php
/**
 *  Copyright © 2016 Bkademy. All rights reserved.
 *  See COPYING.txt for license details.
 *
 */

namespace Bkademy\Webpos\Helper;

class Permission extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var \Bkademy\Webpos\Model\StaffFactory
     */
    protected $staffFactory;

    public function __construct(
        \Bkademy\Webpos\Model\StaffFactory $staffFactory,
        \Bkademy\Webpos\Model\Session $session,
        \Magento\Framework\App\Helper\Context $context
    )
    {
        parent::__construct($context);
        $this->staffFactory = $staffFactory;
        $this->session = $session;

    }
    public function isLogin(){
        
        if($this->session->getWebposId())
            return true;
        return false;
    }
    /**
     *
     * @param \Bkademy\Webpos\Api\Data\Staff\StaffInterface $staff
     * @return int|boolean
     */
    public function login($staff) {
        $username = $staff->getUsername();
        $password = $staff->getPassword();
        $staff = $this->staffFactory->create();
        if ($staff->authenticate($username, $password)) {
            return $staff->getId();
        }
        return null;
    }


}
