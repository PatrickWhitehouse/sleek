<?php
declare(strict_types=1);

namespace Cascade\Sleek\Setup\Patch\Data;

use Cascade\Sleek\Model\ResourceModel\Usp;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class InitialUsps implements DataPatchInterface {

    public function __construct(
        protected ResourceConnection $resourceConnection,
        protected ModuleDataSetupInterface $moduleDataSetup
    )
    {
    }

    public static function getDependencies(): array
    {
        return [];
    }

    public function getAliases(): array
    {
        return [];
    }

    public function apply(): self
    {
        $connection = $this->resourceConnection->getConnection();
        $data = [
            [
                'content' => 'I\'m a USP!'
            ],
            [
                'content' => 'I\'m a USP too!!!'
            ],
            [
                'content' => 'And me'
            ],
            [
                'content' => 'What about me?'
            ]
        ];

        $connection->insertMultiple(Usp::MAIN_TABLE, $data);
        return $this;
    }
}
