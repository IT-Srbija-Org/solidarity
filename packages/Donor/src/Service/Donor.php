<?php
namespace Solidarity\Donor\Service;

use Solidarity\Donor\Repository\DonorRepository;
use Skeletor\Core\TableView\Service\TableView;
use Psr\Log\LoggerInterface as Logger;
use Skeletor\User\Service\Session;
use Solidarity\Donor\Filter\Donor as DonorFilter;
use Tamtamchik\SimpleFlash\Flash;

class Donor extends TableView
{

    /**
     * @param DonorRepository $repo
     * @param Session $user
     * @param Logger $logger
     */
    public function __construct(
        DonorRepository $repo, Session $user, Logger $logger, DonorFilter $filter, private \DateTime $dt
    ) {
        parent::__construct($repo, $user, $logger, $filter);
    }

    public function prepareEntities($entities)
    {
        $items = [];
        /* @var \Solidarity\Donor\Entity\Donor $donor */
        foreach ($entities as $donor) {
            $itemData = [
                'id' => $donor->getId(),
                'email' =>  [
                    'value' => $donor->email,
                    'editColumn' => true,
                ],
                'amount' => number_format($donor->amount, 0, '.', ','),
                'status' => ($donor->status) ? 'Yes ': 'Ne',
                'monthly' => ($donor->monthly) ? 'Yes ': 'Ne',
                'createdAt' => $donor->getCreatedAt()->format('d.m.Y'),
                'updatedAt' => $donor->getUpdatedAt()->format('d.m.Y'),
            ];
            $items[] = [
                'columns' => $itemData,
                'id' => $donor->getId(),
            ];
        }
        return $items;
    }

    public function compileTableColumns()
    {

        $columnDefinitions = [
            ['name' => 'email', 'label' => 'Email', 'priority' => 0],
            ['name' => 'status', 'label' => 'Status', 'filterData' => [0 => 'New', 1 => 'Ready'], 'priority' => 1],
            ['name' => 'monthly', 'label' => 'Monthly', 'filterData' => [0 => 'No', 1 => 'Yes'], 'priority' => 2],
            ['name' => 'amount', 'label' => 'Amount', 'priority' => 3, 'rangeFilter' => ['type' => 'number']],
            ['name' => 'updatedAt', 'label' => 'Updated at', 'priority' => 8],
            ['name' => 'createdAt', 'label' => 'Created at', 'priority' => 9],
        ];

        return $columnDefinitions;
    }

}