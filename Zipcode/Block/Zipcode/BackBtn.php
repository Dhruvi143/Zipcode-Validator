<?php
namespace Codilar\Zipcode\Block\Zipcode;

use Magento\Cms\Block\Adminhtml\Block\Edit\BackButton;

/**
 * Class BackBtn
 * @package Codilar\Zipcode\Block\Zipcode
 *
 * Provides method to go back from the current page
 */
class BackBtn extends BackButton
{
    /**
     * Get URL for back (reset) button
     *
     * @return string
     */
    public function getBackUrl()
    {
        return $this->getUrl('*/*/index');
    }
}
