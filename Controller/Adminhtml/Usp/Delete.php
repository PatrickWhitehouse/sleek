<?php
declare(strict_types=1);

namespace Cascade\Sleek\Controller\Adminhtml\Usp;

use Cascade\Sleek\Api\UspRepositoryInterface;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Result\Page;


class Delete extends Action implements HttpGetActionInterface
{
    const ADMIN_RESOURCE = 'Cascade_Sleek::usp_delete';

    /**
     * @param Context $context
     * @param UspRepositoryInterface $uspRepository
     */
    public function __construct(
        Context                        $context,
        protected UspRepositoryInterface $uspRepository
    )
    {
        parent::__construct($context);
    }

    /**
     * @return Page
     * */
    public function execute(): ResultInterface
    {
        $id = (int) $this->getRequest()->getParam('id');

        try {
            $this->uspRepository->deleteById($id);
            $this->messageManager->addSuccessMessage(__('Deleted'));
        } catch (NoSuchEntityException|LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }

        $redirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $redirect->setPath('*/*/index');
    }
}
