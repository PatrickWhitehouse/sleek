<?php
declare(strict_types=1);

namespace Cascade\Sleek\Ui\DataProvider;

use Cascade\Sleek\Model\ResourceModel\Usp\Collection;
use Cascade\Sleek\Model\ResourceModel\Usp\CollectionFactory;
use Magento\Ui\DataProvider\AbstractDataProvider;

class Usp extends AbstractDataProvider
{
    /** @var Collection $collection */
    protected $collection;

    /** @var array */
    private array $loadedData;

    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        string $name,
        string $primaryFieldName,
        string $requestFieldName,
        protected CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    )
    {
        $this->collection = $this->collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        if (!isset($this->loadedData)) {
            $this->loadedData = [];

            foreach ($this->collection->getItems() as $item) {
                $this->loadedData[$item->getData('id')] = $item->getData();
            }
        }

        return $this->loadedData;
    }
}
