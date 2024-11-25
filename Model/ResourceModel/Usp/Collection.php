<?php
declare(strict_types=1);

namespace Cascade\Sleek\Model\ResourceModel\Usp;

use Cascade\Sleek\Model\Usp;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct() {
        $this->_init(Usp::class, \Cascade\Sleek\Model\ResourceModel\Usp::class);
    }
}
