<?php
namespace Codilar\Zipcode\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Zipcode
 * @package Codilar\Zipcode\Model\ResourceModel
 */
class Zipcode extends AbstractDb
{
    /**
     *  Here init method takes table, primary key as params
     */
    protected function _construct()
    {
        $this->_init('codilar_region', 'id');
    }
}
