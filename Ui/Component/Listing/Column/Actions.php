<?php
declare(strict_types=1);

namespace Cascade\Sleek\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class Actions extends Column
{
    public function __construct(
        ContextInterface       $context,
        UiComponentFactory     $uiComponentFactory,
        protected UrlInterface $urlBuilder,
        array                  $components = [],
        array                  $data = []
    )
    {
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource): array
    {
        if (!isset($dataSource['data']['items'])) {
            return $dataSource;
        }

        foreach ($dataSource['data']['items'] as & $item) {
            if (!isset($item['id'])) {
                continue;
            }

            $item[$this->getData('name')] = [
                'edit' => [
                    'href' => $this->urlBuilder->getUrl('sleek/usp/edit', ['id' => $item['id']]),
                    'label' => __('Edit')
                ],
                'delete' => [
                    'href' => $this->urlBuilder->getUrl('sleek/usp/delete', ['id' => $item['id']]),
                    'label' => __('Delete'),
                    'confirm' => [
                        'title' => __('Delete'),
                        'message' => __('Are you sure you want to delete this USP?'),
                    ],
                ]
            ];
        }

        return $dataSource;
    }
}
