<?php


namespace Bkademy\Webpos\Model\Staff\Data;
class Staff  extends \Magento\Framework\Api\AbstractExtensibleObject implements \Bkademy\Webpos\Api\Data\Staff\StaffInterface
{
    /**
     * Get user name
     *
     * @api
     * @return string|null
     */
    public function getUsername(){
        return $this->_get('username');
    }

    /**
     * Set user name
     *
     * @api
     * @param string $username
     * @return $this
     */
    public function setUsername($username){
        $this->setData('username', $username);
    }
    /**
     * Get password params
     *
     * @api
     * @return string|null
     */
    public function getPassword(){
        return $this->_get('password');
    }

    /**
     * Set password param
     *
     * @api
     * @param string $password
     * @return $this
     */
    public function setPassword($password){
        $this->setData('password', $password);
    }

    /**
     * Get password params
     *
     * @api
     * @return string|null
     */
    public function getOldPassword(){
        return $this->_get('old_password');
    }

    /**
     * Set password param
     *
     * @api
     * @param string $password
     * @return $this
     */
    public function setOldPassword($password){
        $this->setData('old_password', $password);
    }

}