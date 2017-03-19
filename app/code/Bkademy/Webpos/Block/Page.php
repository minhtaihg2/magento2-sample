<?php
namespace Bkademy\Webpos\Block;

class Page extends \Bkademy\Webpos\Block\AbstractBlock
{
    public function toHtml()
    {
        $isLogin = \Magento\Framework\App\ObjectManager::getInstance()->create('Bkademy\Webpos\Helper\Permission')
            ->isLogin();
        if($isLogin)
            return parent::toHtml();
        return '';
    }

}
