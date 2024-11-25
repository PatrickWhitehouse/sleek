<?php

declare(strict_types=1);

namespace Cascade\Sleek\Api\Data;

/**
 * Usp Interface
 * @api
 * @since 1.0.0
 */
interface UspInterface
{
    const ID = 'id';
    const CONTENT = 'content';
    const IS_ENABLED = 'is_enabled';
    const POSITION = 'position';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * @return int
     * */
    public function getId();

    /**
     * @param $id
     * @return int
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getContent();

    /**
     * @param $content
     * @return string
     */
    public function setContent($content);

    /**
     * @return bool
     */
    public function getIsEnabled();

    /**
     * @param $isEnabled
     * @return bool
     */
    public function setIsEnabled($isEnabled);

    /**
     * @return int
     */
    public function getPosition();

    /**
     * @param $position
     * @return int
     */
    public function setPosition($position);

    /**
     * @return string
     */
    public function getCreatedAt();

    /**
     * @return string
     */
    public function getUpdatedAt();
}
