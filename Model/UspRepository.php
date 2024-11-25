<?php
declare(strict_types=1);

namespace Cascade\Sleek\Model;

use Cascade\Sleek\Api\Data\UspInterface;
use Cascade\Sleek\Api\UspRepositoryInterface;
use Cascade\Sleek\Model\ResourceModel\Usp as UspResourceModel;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class UspRepository implements UspRepositoryInterface
{

    public function __construct(
        private UspFactory       $uspFactory,
        private UspResourceModel $uspResourceModel
    )
    {
    }

    public function getById(int $id): UspInterface
    {
        $usp = $this->uspFactory->create();
        $this->uspResourceModel->load($usp, $id);
        if (!$usp->getId()) {
            throw new NoSuchEntityException(__('Usp with id "%1" does not exist.', $id));
        }
        return $usp;
    }

    public function save(UspInterface $usp): void
    {
        try {
            $this->uspResourceModel->save($usp);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
    }

    public function deleteById(int $id): bool
    {
        $post = $this->getById($id);

        try {
            $this->uspResourceModel->delete($post);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }

        return true;
    }
}
