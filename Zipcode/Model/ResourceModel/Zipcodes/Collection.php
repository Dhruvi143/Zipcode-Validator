<?php
namespace Codilar\Zipcode\Model\ResourceModel\Zipcodes;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Codilar\Zipcode\Model\Zipcodes as Model;
use Codilar\Zipcode\Model\ResourceModel\Zipcodes as ResourceModel;

/**
 * class Collection
 *
 *
 * A magento 2 module to have Zipcodes for product Availability
 *
 */
class Collection extends AbstractCollection
{
    /**
     *  Here init method takes Model, ResourceModel classes as params
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
