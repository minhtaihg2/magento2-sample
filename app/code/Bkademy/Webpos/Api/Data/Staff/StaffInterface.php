<?php
/**
 *  Copyright © 2016 Bkademy. All rights reserved.
 *  See COPYING.txt for license details.
 *
 */

namespace Bkademy\Webpos\Api\Data\Staff;

interface StaffInterface
{
    /**
     * Get user name
     *
     * @api
     * @return string|null
     */
    public function getUsername();

    /**
     * Set user name
     *
     * @api
     * @param string $username
     * @return $this
     */
    public function setUsername($username);
    /**
     * Get password params
     *
     * @api
     * @return string|null
     */
    public function getPassword();

    /**
     * Set password param
     *
     * @api
     * @param string $password
     * @return $this
     */
    public function setPassword($password);

    /**
     * Get password params
     *
     * @api
     * @return string|null
     */
    public function getOldPassword();

    /**
     * Set password param
     *
     * @api
     * @param string $password
     * @return $this
     */
    public function setOldPassword($password);


}
