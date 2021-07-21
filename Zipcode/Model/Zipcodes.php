<?php
namespace Codilar\Zipcode\Model;

use Magento\Framework\Model\AbstractModel;
use Codilar\Zipcode\Model\ResourceModel\Zipcodes as ResourceModel;

/**
 * class Zipcode
 *
 * A magento 2 module to have zipcodes for product Availability
 *
 */
class Zipcodes extends AbstractModel
{
    /**
     * Here init method takes Resource Model Class as param
     */


    public function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}
