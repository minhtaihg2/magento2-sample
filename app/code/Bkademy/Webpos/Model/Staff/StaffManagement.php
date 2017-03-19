<?php
/**
 * Created by PhpStorm.
 * User: anhnc
 * Date: 13/03/2017
 * Time: 20:12
 */

namespace Bkademy\Webpos\Model\Staff;


class StaffManagement implements \Bkademy\Webpos\Api\Staff\StaffManagementInterface
{
    /**
     * @var \Bkademy\Webpos\Model\Session
     */
    protected $session;

    /**
     * @var \Magento\Framework\App\RequestInterface
     */
    protected $request;

    /**
     * @var Permission
     */
    protected $permissionHelper;


    /**
     * StaffManagement constructor.
     * @param \Magento\Framework\Stdlib\DateTime\TimezoneInterface $timezone
     * @param \Bkademy\Webpos\Model\WebPosSession $webPosSession
     * @param \Bkademy\Webpos\Model\Staff $staff
     */
    public function __construct(
        \Bkademy\Webpos\Model\Session $session,
        \Bkademy\Webpos\Helper\Permission $permission,
        \Magento\Framework\App\RequestInterface $request
    )
    {
        $this->session = $session;
        $this->permissionHelper = $permission;
        $this->request = $request;
    }

    /**
     * @param \Bkademy\Webpos\Api\Data\Staff\StaffInterface $staff
     * @return string
     */
    public function login($staff)
    {
//        die('fe');
        $username = $staff->getUsername();
        $password = $staff->getPassword();
       
        if ($username && $password) {
            try {
                $staffId = $this->permissionHelper->login($staff);
                if ($staffId) {
                    $this->session->setWebposId($staffId);
                    return true;
                } else {
                    return false;
                }
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
        return false;
    }

    /**
     *
     * @return boolean
     */
    public function logout()
    {
        $this->session->setWebposId(null);
        return true;
    }

    public function changepassword($staff)
    {
        // TODO: Implement changepassword() method.
    }
}
