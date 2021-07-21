<?php
namespace Codilar\Zipcode\Model;

use Magento\Framework\Model\AbstractModel;
use Codilar\Zipcode\Model\ResourceModel\Zipcode as ResourceModel;
use Codilar\Zipcode\Model\Zipcode\FileInfo;
use Magento\Framework\App\ObjectManager;
use Magento\Store\Model\StoreManagerInterface;

/**
 * class Zipcode
 *
 * A magento 2 module to have zipcodes for product Availability
 *
 */
class Zipcode extends AbstractModel
{
    /**
     * Here init method takes Resource Model Class as param
     */
    /**
     * Store manager
     *
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    public function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * Retrieve the Image URL
     *
     * @param string $imageName
     * @return bool|string
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getFileUrl($fileName = null)
    {
        $url = '';
        $file = $fileName;
        if (!$file) {
            $file = $this->getData('zipcode');
        }
        if ($file) {
            if (is_string($file)) {
                $url = $this->_getStoreManager()->getStore()->getBaseUrl(
                    \Magento\Framework\UrlInterface::URL_TYPE_MEDIA
                ) . FileInfo::ENTITY_MEDIA_PATH . '/' . $file;
            } else {
                throw new \Magento\Framework\Exception\LocalizedException(
                    __('Something went wrong while getting the image url.')
                );
            }
        }
        return $url;
    }

    /**
     * Get StoreManagerInterface instance
     *
     * @return StoreManagerInterface
     */
    private function _getStoreManager()
    {
        if ($this->_storeManager === null) {
            $this->_storeManager = ObjectManager::getInstance()->get(StoreManagerInterface::class);
        }
        return $this->_storeManager;
    }
}
