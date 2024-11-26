<?php
declare(strict_types=1);

namespace Cascade\Sleek\Api;

interface ModuleConfigurationInterface
{
    const ENABLED_XML_PATH = 'cascade_development_sleek/general/enabled';
    const BACKGROUND_COLOR_XML_PATH = 'cascade_development_sleek/customisations/background_color';
    const TEXT_COLOR_XML_PATH = 'cascade_development_sleek/customisations/text_color';

    /**
     * @return bool
     */
    public function getIsEnabled(): bool;

    /**
     * @return string|null
     */
    public function getBackgroundColor(): string|null;

    /**
     * @return string|null
     */
    public function getTextColor(): string|null;
}
