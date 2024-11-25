<?php
declare(strict_types=1);

namespace Cascade\Sleek\Model;

use Cascade\Sleek\Api\Data\UspInterface;
use Magento\Framework\Model\AbstractModel;

class Usp extends AbstractModel implements UspInterface
{
    protected function _construct()
    {
        $this->_init(ResourceModel\Usp::class);
    }

    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }

    public function getIsEnabled()
    {
        return $this->getData(self::IS_ENABLED);
    }

    public function setIsEnabled($isEnabled)
    {
        return $this->setData(self::IS_ENABLED, $isEnabled);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    public function getPosition()
    {
        return $this->getData(self::POSITION);
    }

    public function setPosition($position)
    {
        return $this->setData(self::POSITION, $position);
    }
}
