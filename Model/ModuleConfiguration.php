<?php

namespace Cascade\Sleek\Model;

use Cascade\Sleek\Api\ModuleConfigurationInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class ModuleConfiguration implements ModuleConfigurationInterface
{

    public function __construct(
        protected ScopeConfigInterface $scopeConfig,
    )
    {
    }

    /**
     * @return bool
     */
    public function getIsEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag(self::ENABLED_XML_PATH);
    }

    /**
     * @return string|null
     */
    public function getBackgroundColor(): string|null
    {
        return $this->scopeConfig->getValue(self::BACKGROUND_COLOR_XML_PATH);
    }

    public function getTextColor(): string|null
    {
        return $this->scopeConfig->getValue(self::TEXT_COLOR_XML_PATH);
    }
}
