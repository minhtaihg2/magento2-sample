<?php

namespace Bkademy\Webpos\Setup;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\InstallDataInterface;

class InstallData implements InstallDataInterface
{

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        // Set up data rows
        $dataRows = [
            'username'          => 'taipham',
            'password'         => '123456',
            'email'          => 'taipham.it@gmail.com',
            'display_name'   => 'Tai Pham',
            'status'        => '1',
        ];
        // Generate news items
        $setup->getConnection()->insert($setup->getTable('webpos_staff'), $dataRows);
    }
}

