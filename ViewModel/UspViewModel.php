<?php
declare(strict_types=1);

namespace Cascade\Sleek\ViewModel;

use Cascade\Sleek\Model\ResourceModel\Usp\Collection;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class UspViewModel implements ArgumentInterface
{
    public function __construct(
        private Collection $collection,
    )
    {
    }

    /**
     * @return array
     */
    private function getUsps(): array
    {
        return $this->collection->getItems();
    }

    /**
     * @return array
     */
    public function getEnabledUsps(): array
    {
        $usps = $this->getUsps();
        if (!empty($usps)) {
            return array_filter($usps, function ($usp) {
               return $usp->getIsEnabled();
            });
        }
        return $usps;
    }
}
