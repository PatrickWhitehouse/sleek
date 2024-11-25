<?php
declare(strict_types=1);

namespace Cascade\Sleek\Controller\Adminhtml\Usp;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class NewAction extends Action implements HttpGetActionInterface
{
    const ADMIN_RESOURCE = 'Cascade_Sleek::usp_save';

    /**
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(
        Context $context,
        protected PageFactory $pageFactory
    )
    {
        parent::__construct($context);
    }

    /**
     * @return Page
     * */
    public function execute(): Page
    {
       $page = $this->pageFactory->create();
       $page->setActiveMenu('Cascade_Sleek::usp');
       $page->getConfig()->getTitle()->prepend(__('New Usp'));
       return $page;
    }
}
