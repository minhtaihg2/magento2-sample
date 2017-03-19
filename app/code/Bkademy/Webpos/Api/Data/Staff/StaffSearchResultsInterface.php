<?php
/**
 *  Copyright © 2016 Bkademy. All rights reserved.
 *  See COPYING.txt for license details.
 *
 */

namespace Bkademy\Webpos\Api\Data\Staff;

/**
 * Interface for customer search results.
 */
interface StaffSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get staff list.
     *
     * @api
     * @return \Bkademy\Webpos\Api\Data\Staff\StaffInterface[]
     */
    public function getItems();

    /**
     * Set staff list.
     *
     * @api
     * @param \Bkademy\Webpos\Api\Data\Staff\StaffInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
