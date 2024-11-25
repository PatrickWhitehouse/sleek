<?php
declare(strict_types=1);
namespace Cascade\Sleek\Controller\Adminhtml\Usp;

use Cascade\Sleek\Api\UspRepositoryInterface;
use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Cascade\Sleek\Model\ResourceModel\Usp\CollectionFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Ui\Component\MassAction\Filter;
use Magento\Backend\App\Action\Context;

class MassDelete extends Action implements HttpPostActionInterface
{
    const ADMIN_RESOURCE = 'Cascade_Sleek::usp_delete';

    /**
     * @param Context $context
     * @param CollectionFactory $collectionFactory
     * @param UspRepositoryInterface $uspRepository
     * @param Filter $filter
     */
    public function __construct(
        Context $context,
        protected CollectionFactory $collectionFactory,
        protected UspRepositoryInterface $uspRepository,
        protected Filter $filter
    )
    {
        parent::__construct($context);
    }

    /**
     * @return ResultInterface
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function execute(): ResultInterface
    {
        $collection = $this->collectionFactory->create();
        $items = $this->filter->getCollection($collection);
        $itemsSize = $items->getSize();

        foreach ($items as $item) {
            $this->uspRepository->deleteById((int)$item->getId());
        }

        $this->messageManager->addSuccessMessage(__('%1 were deleted.', $itemsSize));

        $redirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $redirect->setPath('*/*');
    }
}
