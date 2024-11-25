<?php
declare(strict_types=1);

namespace Cascade\Sleek\Api;


use Cascade\Sleek\Api\Data\UspInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Usp Repository Interface
 * @api
 * @since 1.0.0
 */
interface UspRepositoryInterface {

    /**
     * @param int $id
     * @return UspInterface
     * @throws LocalizedException
     */
    public function getById(int $id): UspInterface;

    /**
     * @param UspInterface $usp
     * @return UspInterface
     * @throws LocalizedException
     */
    public function save(UspInterface $usp): UspInterface;

    /**
     * @param int $id
     * @return bool
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function deleteById(int $id): bool;
}
