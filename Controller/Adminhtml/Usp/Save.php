<?php
declare(strict_types=1);

namespace Cascade\Sleek\Controller\Adminhtml\Usp;

use Cascade\Sleek\Api\Data\UspInterfaceFactory;
use Cascade\Sleek\Api\UspRepositoryInterface;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

class Save extends Action implements HttpPostActionInterface
{
    const ADMIN_RESOURCE = 'Cascade_Sleek::usp_save';

    /**
     * @param Context $context
     * @param UspRepositoryInterface $uspRepository
     * @param UspInterfaceFactory $usp
     */
    public function __construct(
        Context                          $context,
        protected UspRepositoryInterface $uspRepository,
        protected UspInterfaceFactory    $usp,
    )
    {
        parent::__construct($context);
    }

    /**
     * @return ResultInterface
     * @throws LocalizedException
     */
    public function execute(): ResultInterface
    {
        $post = $this->getRequest()->getPost();
        $isExistingPost = (int) $post->id;
        $usp = $this->usp->create();
        $redirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        if ($isExistingPost) {
            try {
                $usp = $this->uspRepository->getById($post->id);
            } catch (NoSuchEntityException $exception) {
                $this->messageManager->addErrorMessage($exception->getMessage());
                return $redirect->setPath('*/*/');
            }
        } else {
            unset($post->id);
        }

        $usp->setData(array_merge($usp->getData(), $post->toArray()));

        try {
            $this->uspRepository->save($usp);
            $this->messageManager->addSuccessMessage(__('Usp has been saved.'));
        } catch (LocalizedException $exception) {
            $this->messageManager->addErrorMessage($exception->getMessage());
        }
        return $redirect->setPath('*/*/');
    }
}
