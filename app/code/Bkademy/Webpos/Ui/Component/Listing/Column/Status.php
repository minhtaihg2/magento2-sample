<?php

/**
 *  Copyright © 2016 Magestore. All rights reserved.
 *  See COPYING.txt for license details.
 *
 */
namespace Bkademy\Webpos\Ui\Component\Listing\Column;

use Magento\Framework\Data\OptionSourceInterface;


class Status implements OptionSourceInterface
{
    /**
     * 
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['label' => __('Enabled'),'value' => 1],
            ['label' => __('Disabled'),'value' => 2],
        ];
    }
}
