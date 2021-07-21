<?php
namespace Codilar\Zipcode\Block\Zipcode;

use Magento\CatalogRule\Block\Adminhtml\Edit\GenericButton;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class SaveBtn
 * @package Codilar\Zipcode\Block\Zipcode
 */
class SaveBtn extends GenericButton implements ButtonProviderInterface
{

    /**
     * Retrieve button-specified settings
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => [
                    'buttonAdapter' => [
                        'actions' => [
                            [
                                'targetName' => 'template_add_ui.template_add_ui',
                                'params' => [
                                    false
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }
}
