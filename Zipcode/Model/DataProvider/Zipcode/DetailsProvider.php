<?php
namespace Codilar\Zipcode\Model\DataProvider\Zipcode;

use Codilar\Zipcode\Model\ResourceModel\Zipcode\CollectionFactory as CollectionFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Magento\Framework\App\ObjectManager;
use Codilar\Zipcode\Model\Zipcode\FileInfo;
use Magento\Framework\Filesystem;

/**
 * Class DetailsProvider
 * @package Codilar\Zipcode\Model\DataProvider\Zipcode
 */
class DetailsProvider extends AbstractDataProvider
{
    protected $loadedData;
    private $request;
    /**
     * @var Collection
     */
    private $collectionFactory;
    /**
     * @var Filesystem
     */
    private $fileInfo;

    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $collectionFactory
     * @param string $request
     * @param string $requestFieldName
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        RequestInterface $request,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
        $this->request = $request;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $id = $this->request->getParam('id');
        $items = $this->collectionFactory->create()->addFieldToFilter('id', $id)->getItems();
        foreach ($items as $item) {
            $zipcodeData = $this->convertValues($item);
            $zipcodeData = $item->getData();
            $this->loadedData[$item->getId()] = $zipcodeData;
        }
        return $this->loadedData;
    }
    /**
     * Converts file data to acceptable for rendering format
     *
     * @param \Codilar\Zipcode\Model\Zipcode $zipcode
     * @return \Codilar\Zipcode\Model\Zipcode $zipcode
     */
    private function convertValues($zipcode)
    {
        $fileName = $zipcode->getFile();
        $zipcode = [];
        if ($this->getFileInfo()->isExist($fileName)) {
            $stat = $this->getFileInfo()->getStat($fileName);
            $mime = $this->getFileInfo()->getMimeType($fileName);
            $zipcode[0]['name'] = $fileName;
            $zipcode[0]['url'] = $zipcode->getFileUrl();
            $zipcode[0]['size'] = isset($stat) ? $stat['size'] : 0;
            $zipcode[0]['type'] = $mime;
        }
        $zipcode->setFile($zipcode);

        return $zipcode;
    }

    /**
     * Get FileInfo instance
     *
     * @return FileInfo
     *
     */
    private function getFileInfo()
    {
        if ($this->fileInfo === null) {
            $this->fileInfo = ObjectManager::getInstance()->get(FileInfo::class);
        }
        return $this->fileInfo;
    }
}
